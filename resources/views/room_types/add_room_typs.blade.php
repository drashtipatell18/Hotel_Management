@extends('layouts.master')
@section('content')
    <style>
        input[type="checkbox"] {
            width: 20px;
            height: 20px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            /* Space below each item */
        }

        .checkbox-item input[type="checkbox"] {
            margin-right: 8px;
        }

        .extra-bed-textbox {
            margin-bottom: 15px;
            /* Adjust the spacing between textboxes */
        }
        .samethemebutton{
            background: #009688;
           color: white;
        }
        .samethemebutton a:hover{
            background: #009688;

        }
    </style>

    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-title mt-5">{{ isset($roomtype) ? 'Edit Room Type' : 'Add Room Type' }}</div>
                    </div>
                </div>
            </div>
            <form action="{{ isset($roomtype) ? '/roomtype/update/' . $roomtype->id : '/roomtype/store' }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>RoomType Name</label>
                                    <input type="text" class="form-control @error('room_name') is-invalid @enderror"
                                        name="room_name" value="{{ old('room_name', $roomtype->room_name ?? '') }}">
                                    @error('room_name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Member Capacity</label>
                                    <input type="number" class="form-control @error('capacity') is-invalid @enderror"
                                        name="capacity" value="{{ old('capacity', $roomtype->capacity ?? '') }}">
                                    @error('capacity')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Base Price</label>
                                        <input type="number" id="base_price" class="form-control @error('base_price') is-invalid @enderror" name="base_price" value="{{ old('base_price', $roomtype->base_price ?? '') }}">
                                    @error('base_price')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Extra Bed:</label>
                                    <input type="checkbox" id="extra_bed_checkbox" class="form-control @error('extra_bed') is-invalid @enderror" name="extra_bed" {{ old('extra_bed', $roomtype->extra_bed ?? 0) ? 'checked' : '' }}>
                                    @error('extra_bed')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6" id="extra_bed_textbox" style="display: none;">
                                <p id="total_extra_bed_price_display" style="color:red">Total Extra Price <span
                                        id="total_extra_bed_price">0.00</span></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="per_extra_bed_price">Per Extra Bed Price</label>
                                            <input type="number" id="per_extra_bed_price" class="form-control"
                                                name="per_extra_bed_price"
                                                value="{{ old('per_extra_bed_price', $roomtype->per_extra_bed_price ?? '') }}">
                                                @error('per_extra_bed_price')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="extra_bed_quantity_2">Extra Bed Quantity</label>
                                            <input type="number" id="extra_bed_quantity" class="form-control" name="extra_bed_quantity" value="{{ old('extra_bed_quantity', $roomtype->extra_bed_quantity ?? '') }}">
                                            @error('extra_bed_quantity')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Extra Base Price</label>
                                    <input readonly type="number"
                                        class="form-control @error('extra_bed_price') is-invalid @enderror"
                                        id="total_base_price" name="extra_bed_price">
                                    @error('extra_bed_price')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                        </div>


                    </div>
                </div>

                <?php
                        $selectedAmenities = isset($roomtype) ? explode(",", $roomtype->amenities_id) : [];
                    ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-12">
                                <label>Amenities</label>
                                <fieldset class="checkbox-container">
                                    <div class="row">
                                        @foreach($amenities as $amenity)
                                        <div class="col-md-2 checkbox-item">
                                        <input type="checkbox" id="amenity_{{ $amenity->id }}" name="amenities_id[]" value="{{ $amenity->id }}"
                                        @if(in_array($amenity->id, $selectedAmenities)) checked @endif>
                                            <label for="amenity_{{ $amenity->id }}">{{ $amenity->name }}</label>
                                        </div>
                                    @endforeach
                                    @error('amenities_id')
                                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="roomType_image">Room Type Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('room_image') is-invalid @enderror" id="room_image" name="room_image[]" multiple onchange="previewImages(event)">
                                <label class="custom-file-label" for="room_image">Choose files</label>
                                @error('room_image')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label>Image Preview</label>
                            <div id="imagePreview" class="row">
                                <!-- Check if roomtype exists and has images -->
                                @if(isset($roomtype) && $roomtype->images)
                                    @foreach($roomtype->images as $image)
                                        <div class="col-md-2 mb-3" id="image-{{ $image->id }}">
                                            <div class="text-center">
                                                <img src="{{ URL::to('/assets/upload/'.$image->room_image) }}" alt="Room Type Image" class="img-fluid rounded mb-2" style="width: 100%; height: 100px; object-fit: cover;">
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-2" onclick="deleteImage('{{ $image->id }}')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p></p>
                                @endif
                                <!-- Image previews for new uploads will be appended here -->
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{ old('description', $roomtype->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1"> {{ isset($roomtype) ? 'Update' : 'Create New RoomType' }}</button>
                @if (isset($roomtype))
                    <a href="{{ route('roomtype/list') }}"  type="submit" class="btn btn-secondary  padding:10px" style="float:right !important;margin-right:10px !important; padding:10px !important">Back</a>
                @endif
            </form>
        </div>
    </div>

@section('script')
<script>
    $(document).ready(function() {
         if ($('#extra_bed_checkbox').is(':checked')) {
            $('#extra_bed_textbox').show();
        }
        $('#extra_bed_checkbox').change(function() {
            if ($(this).is(':checked')) {
                $('#extra_bed_textbox').show();
            } else {
                $('#extra_bed_textbox').hide();
            }
        });

    });
</script>

<script>
    // Calculate  per_extra_bed_price  *  extra_bed_quantity
    document.addEventListener('DOMContentLoaded', function () {
        function calculateTotalExtraBedPrice() {
            var perExtraBedPrice = parseFloat(document.getElementById('per_extra_bed_price').value) || 0;

            var extraBedQuantity = parseInt(document.getElementById('extra_bed_quantity').value) || 0;
            var base_price = parseInt(document.getElementById('base_price').value) || 0;

            var totalExtraBedPrice = perExtraBedPrice * extraBedQuantity;
            console.log(totalExtraBedPrice);
            var totalBasePrice = totalExtraBedPrice + base_price;

            document.getElementById('total_extra_bed_price').textContent = totalExtraBedPrice.toFixed(2); // Update the displayed total price
            document.getElementById('total_base_price').value = totalBasePrice.toFixed(2); // Update the displayed total price
        }
        document.getElementById('per_extra_bed_price').addEventListener('input', calculateTotalExtraBedPrice);
        document.getElementById('extra_bed_quantity').addEventListener('input', calculateTotalExtraBedPrice);
        document.getElementById('base_price').addEventListener('input', calculateTotalExtraBedPrice);

        calculateTotalExtraBedPrice();
    });
</script>
<script>
    // Image Preview
    function previewImages(event) {
      const previewContainer = document.getElementById('imagePreview');
      const files = event.target.files;

      for (const file of files) {
          const reader = new FileReader();
          reader.onload = function (e) {
              const img = document.createElement('img');
              img.src = e.target.result;
              img.className = 'img-fluid rounded mb-2';
              img.style.width = '100%';
              img.style.height = '100px';
              img.style.objectFit = 'cover';

              const div = document.createElement('div');
              div.className = 'col-md-2 mb-3';
              div.innerHTML = `
                  <div class="text-center">
                      ${img.outerHTML}
                      <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-2" onclick="removePreview(this)">
                          <i class="fas fa-trash-alt"></i> Delete
                      </a>
                  </div>
              `;

              previewContainer.appendChild(div);
          };
          reader.readAsDataURL(file);
      }
  }

  function removePreview(element) {
      element.parentElement.parentElement.remove();
  }

  function deleteImage(imageId) {
            if (confirm('Are you sure you want to delete this image?')) {
                $.ajax({
                    url: '/roomtype/image/delete/' + imageId, // Replace with your actual delete route
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (response.success) {
                            location.reload(); // Optionally reload the page or remove the image element
                        } else {
                            alert('Failed to delete the image');
                        }
                    }
                });
            }
        }

</script>

@endsection

@endsection
