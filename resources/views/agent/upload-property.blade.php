@extends('layouts.dashboard')

@section('content')

    <div class="col-lg-12">
        @include('notification')
        <div class="white_card card_height_100 mb_30 QA_section">
            <div class="white_card_header">

                <div class="box_header m-0">
                    <div class="main-title">
                        <h3 class="m-0">Upload Property</h3>
                    </div>
                </div>
            </div>
            <div class="white_card_body" style="padding: 100px;">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form id="property-id" action="{{ route('agent-upload-property') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Property Name -->
                            <div class="form-label mb-3">
                                <label class="form-label" for="name">Property Name</label>
                                <input name="name" type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Beautiful House" autocomplete="name" required/>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <!-- Property Description -->
                            <div class="form-label mb-3">
                                <label class="form-label" for="description">Description</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                          placeholder="Detailed description of the property" required></textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <!-- Property Thumbnail -->
                            <div class="form-label mb-3">
                                <label class="form-label" for="thumbnail">Thumbnail Image (PNG/JPG)</label>
                                <input name="thumbnail" type="file" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror"
                                       required/>

                                @error('thumbnail')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>


                            <div class="form-label mb-3">
                                <label class="form-label" for="category">Select Category</label>
                                <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required>
                                    <option value="" disabled selected>Select a Category</option>
                                    <option value="Rent">Rent</option>
                                    <option value="Sale">Sale</option>

                                </select>

                                @error('district')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-label mb-3">
                                <label class="form-label" for="district">Select District</label>
                                <select name="district" id="district" class="form-control @error('district') is-invalid @enderror" required>
                                    <option value="" disabled selected>Select a district</option>
                                    <option value="Maitama">Maitama</option>
                                    <option value="Jabi">Jabi</option>
                                    <option value="Wuse">Wuse</option>
                                    <option value="Wuse II">Wuse II</option>
                                    <option value="Lifecamp">Lifecamp</option>
                                    <option value="Jahi">Jahi</option>
                                    <option value="Katampe Extension">Katampe Extension</option>
                                    <option value="Katampe">Katampe</option>
                                    <option value="Asokoro">Asokoro</option>
                                    <option value="Guzape">Guzape</option>

                                </select>

                                @error('district')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Property Size -->
                            <div class="form-label mb-3">
                                <label class="form-label" for="price">Price (in Naira)</label>
                                <input name="price" type="text" id="price" class="form-control @error('price') is-invalid @enderror"
                                       placeholder="2000000" required/>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-label mb-3">
                                <label class="form-label" for="size">Property Size(in Sqm)</label>
                                <input name="size" type="text" id="size" class="form-control @error('size') is-invalid @enderror"
                                       placeholder="2000" required/>

                                @error('size')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-label mb-3">
                                <label class="form-label" for="type">Select Type</label>
                                <select name="type" type="text" id="type" class="form-control @error('type') is-invalid @enderror" required>
                                    <option disabled>Select property type</option>
                                    <option value="House" >House</option>
                                    <option value="Land">Land</option>
                                    <option value="Apartment">Apartment</option>
                                </select>

                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>


                            <div class="form-label mb-3">
                                <label class="form-label" for="bedroom">Bedroom</label>
                                <input name="bedroom" type="text" id="bedroom" class="form-control @error('bedroom') is-invalid @enderror"
                                       placeholder="Number of bedrooms" required/>

                                @error('bedroom')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>


                            <div class="form-label mb-3">
                                <label class="form-label" for="bathroom">Bathroom</label>
                                <input name="bathroom" type="text" id="bathroom" class="form-control @error('bathroom') is-invalid @enderror"
                                       placeholder="Number of bathrooms" required/>

                                @error('bathroom')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-label mb-3">
                                <label class="form-label" for="parking_space">Parking Space</label>
                                <input name="parking_space" type="text" id="parking_space" class="form-control @error('parking_space') is-invalid @enderror"
                                       placeholder="Number of parking spaces" required/>

                                @error('parking_space')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-label mb-3">
                                <input type="text" name="google_map_url" id="autocomplete" class="form-control controls @error('google_map_url') is-invalid @enderror" placeholder="Map Address" required>
                                <input type="hidden" name="latitude" id="latitude" class="form-control" required>
                                <input type="hidden" name="longitude" id="longitude" class="form-control" required>

                                @error('google_map_url')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-label mb-3">
                                <label class="form-label" for="images">Property Images (PNG/JPG)</label>
                                <input name="images[]" type="file" id="images" class="form-control @error('images') is-invalid @enderror"
                                       multiple required/>

                                @error('images')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>


                            <div class="form-label mb-3">
                                <label class="form-label" for="features">Property Features</label>
                                <div id="features">
                                    <div class="input-group mb-2">
                                        <input name="feature_names[]" type="text" class="form-control" placeholder="Feature Name" required>
                                        <input name="feature_values[]" type="text" class="form-control" placeholder="Feature Value" required>
                                        <button type="button" class="btn btn-outline-secondary" onclick="addFeature()">Add More</button>
                                    </div>
                                </div>
                            </div>


                            <div class="form-label mb-3">
                                <label class="form-label" for="amenities">Property Amenities</label>
                                <div id="amenities">
                                    <div class="input-group mb-2">
                                        <input name="amenities[]" type="text" class="form-control" placeholder="Amenity Name" required>
                                        <button type="button" class="btn btn-outline-secondary" onclick="addAmenity()">Add More</button>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">Upload</button>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>


            </div>
        </div>
    </div>


    @push('add-feature')

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz-usFFWCvxfSLRR1lHqe-60qlEzAvPTc&libraries=places&callback=addressComplete" defer async></script>


        <script>
            function addFeature() {
                var features = document.getElementById('features');
                var newFeature = document.createElement('div');
                newFeature.className = 'input-group mb-2';
                newFeature.innerHTML = `
            <input name="feature_names[]" type="text" class="form-control" placeholder="Feature Name">
            <input name="feature_values[]" type="text" class="form-control" placeholder="Feature Value">
            <button type="button" class="btn btn-outline-secondary" onclick="removeElement(this)">Remove</button>
        `;
                features.appendChild(newFeature);
            }

            function addAmenity() {
                var amenities = document.getElementById('amenities');
                var newAmenity = document.createElement('div');
                newAmenity.className = 'input-group mb-2';
                newAmenity.innerHTML = `
            <input name="amenities[]" type="text" class="form-control" placeholder="Amenity Name">
            <button type="button" class="btn btn-outline-secondary" onclick="removeElement(this)">Remove</button>
        `;
                amenities.appendChild(newAmenity);
            }

            function removeElement(element) {
                element.parentElement.remove();
            }


        </script>

        <script>
            function addressComplete() {
                var input = document.getElementById('autocomplete');
                var latitude = document.getElementById('latitude');
                var longitude = document.getElementById('longitude');
                var autocomplete = new google.maps.places.Autocomplete(input);
                var form = document.getElementById('property-id');

                // Listen for form submission
                form.addEventListener('submit', function(event) {
                    if (input.value === '' || latitude.value === '' || longitude.value === '') {
                        event.preventDefault();
                        alert('Please select an address from the dropdown.');
                    }
                });

                autocomplete.addListener('place_changed', function() {
                    var place = autocomplete.getPlace();
                    document.getElementById('latitude').value = place.geometry.location.lat();
                    document.getElementById('longitude').value = place.geometry.location.lng();
                });
            }
        </script>


    @endpush

@endsection
