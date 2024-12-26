<div>
    <!-- Modal Profile -->
    <div wire:ignore.self class="modal fade" id="viewMusic" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: rgb(139, 137, 137); color: white;">
                <div class="modal-body">
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="card border-0" style="background-color: rgb(139, 137, 137); color: white;">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img src="{{ Storage::url($musicView_image) }}"
                                                style="width: 150px; heigth: 150px; border-radius: 50%; object-fit: cover;"
                                                alt="Profile picture">
                                            <h4 class="mb-0">{{ $musicView_author }}</h4>
                                            <hr>
                                            <p class="card=text">{{ $musicView_title }}</p>
                                            <p class="card-text">{{ $musicView_description }}</p>
                                        </div>
                                        <ul class="list-group list-group-flush mt-3">
                                            <li class="list-group-item" style="background-color: rgb(139, 137, 137); color: white;">
                                                <div class="d-flex justify-content-between">
                                                    <strong>Rate:</strong>
                                                    <span>{{ number_format($musicView_price, 2) }}</span>
                                                </div>
                                            </li>
                                            <li class="list-group-item" style="background-color: rgb(139, 137, 137); color: white;">
                                                <div class="d-flex justify-content-between">
                                                    <strong>Address:</strong>
                                                    <span>{{ $musicView_location }}</span>
                                                </div>
                                            </li>
                                            <li class="list-group-item" style="background-color: rgb(139, 137, 137); color: white;">
                                                <div class="d-flex justify-content-between">
                                                    <strong>Genre:</strong>
                                                    <span>{{ $musicView_genre }}</span>
                                                </div>
                                            </li>
                                            <li class="list-group-item" style="background-color: rgb(139, 137, 137); color: white;">
                                                <div class="d-flex justify-content-between">
                                                    <strong>Ratings:</strong>
                                                    <span>
                                                        @for ($i = 0; $i < $musicView_rating; $i++)
                                                            <i class="fa fa-star"
                                                                style="color: yellow; font-size: 11px;"></i>
                                                        @endfor
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeView()">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
