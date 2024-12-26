<div>
    <!-- Modal Update Music-->
    <div wire:ignore.self class="modal fade" id="updateMusic" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: rgb(139, 137, 137); color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Music</h5>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group mb-3">
                            <label for="title">Profile Image:</label>
                            <input type="file" class="form-control" id="image" wire:model="image" required>
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" style="width: 120px;" class="mt-1">
                            @endif
                            @error('image')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" placeholder="Title"
                                wire:model="title" required>
                            @error('title')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="author">Author:</label>
                            <input type="text" class="form-control" placeholder="Author" id="author"
                                wire:model="author" required>
                            @error('author')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" placeholder="Description" rows="3" wire:model="description"
                                required></textarea>
                            @error('description')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="location">Location:</label>
                            <select class="form-control" id="location" wire:model="location" required>
                                <option selected hidden="true">Choose Location</option>
                                <option disabled>Choose Location</option>
                                <option value="Los Angeles">Los Angeles</option>
                                <option value="New York">New York</option>
                                <option value="Chicago">Chicago</option>
                                <option value="Houston">Houston</option>
                                <option value="Miami">Miami</option>
                                <option value="Seattle">Seattle</option>
                                <option value="San Francisco">San Francisco</option>
                                <option value="Boston">Boston</option>
                                <option value="Austin">Austin</option>
                                <option value="Nashville">Nashville</option>
                                <option value="Denver">Denver</option>
                                <option value="Portland">Portland</option>
                                <option value="Atlanta">Atlanta</option>
                                <option value="Las Vegas">Las Vegas</option>
                                <option value="Philadelphia">Philadelphia</option>
                                <option value="Philippines">Philippines</option>
                            </select>
                            @error('location')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="genre">Genre:</label>
                            <select class="form-control" id="genre" wire:model="genre" required>
                                <option selected hidden="true">Choose Genre</option>
                                <option disabled>Choose Genre</option>
                                <option value="Rock">Rock</option>
                                <option value="Pop">Pop</option>
                                <option value="Hip Hop">Hip Hop</option>
                                <option value="R&B">R&B</option>
                                <option value="Country">Country</option>
                                <option value="Jazz">Jazz</option>
                                <option value="Blues">Blues</option>
                                <option value="Classical">Classical</option>
                            </select>
                            @error('genre')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price:</label>
                            <input type="range" class="form-range" max="10000" min="1" step="1"
                                id="price" placeholder="Price" wire:model="price" required>
                            <div class="input-group-append">
                                <span class="input-group-text">₱ {{ number_format($price, 2) }}</span>
                            </div>
                            @error('price')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="rating">Rating: {{ $rating }}</label>
                            <input type="range" class="form-range" max="5" min="0" step="1"
                                id="rating" placeholder="Rating" wire:model="rating" required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    Rating(s):&nbsp;
                                    @for ($i = 0; $i < $rating; $i++)
                                        <i class="fa fa-star" style="color: yellow;"></i>
                                    @endfor
                                </span>
                            </div>
                            @error('rating')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" wire:click="update()">Update</button>
                    <button class="btn btn-outline-dark" wire:click="resetInputs()">Reset Inputs</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
