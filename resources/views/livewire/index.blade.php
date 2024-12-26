<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow bg-dark">
                <div class="card-body">
                    <h5 class="text-center text-white">Filter Your Choice</h5>
                    <div class="form-group mb-3">
                        <label for="search" class="text-white">Search:</label>
                        <input type="text" placeholder="search" class="form-control" wire:model.lazy="search">
                    </div>
                    <div class="form-group mb-3 text-white">
                        <label for="genre">Select Genre</label>
                        <br>
                        <input type="checkbox" wire:model="checkGenre" value="Rock"> Rock<br>
                        <input type="checkbox" wire:model="checkGenre" value="Pop"> Pop<br>
                        <input type="checkbox" wire:model="checkGenre" value="Hip Hop"> Hip Hop<br>
                        <input type="checkbox" wire:model="checkGenre" value="R&B"> R&B<br>
                        <input type="checkbox" wire:model="checkGenre" value="Country"> Country<br>
                        <input type="checkbox" wire:model="checkGenre" value="Jazz"> Jazz<br>
                        <input type="checkbox" wire:model="checkGenre" value="Blues"> Blues<br>
                        <input type="checkbox" wire:model="checkGenre" value="Classical"> Classical<br>
                    </div>
                    <div class="form-group mb-3 text-white">
                        <label for="location">Select Location:</label>
                        <select class="form-select" wire:model="selectLocation">
                            <option value="All">All</option>
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
                    </div>

                    <div class="form-group mb-3 text-white">
                        <label for="rating">Ratings:</label>
                        <br>
                        <input type="checkbox" wire:model="checkRating" value="1">
                        @for ($i = 0; $i < 1; $i++)
                            <i class="fa fa-star" style="color: yellow;"></i>
                        @endfor
                        <br>
                        <input type="checkbox" wire:model="checkRating" value="2">
                        @for ($i = 0; $i < 2; $i++)
                            <i class="fa fa-star" style="color: yellow;"></i>
                        @endfor
                        <br>
                        <input type="checkbox" wire:model="checkRating" value="3">
                        @for ($i = 0; $i < 3; $i++)
                            <i class="fa fa-star" style="color: yellow;"></i>
                        @endfor
                        <br>
                        <input type="checkbox" wire:model="checkRating" value="4">
                        @for ($i = 0; $i < 4; $i++)
                            <i class="fa fa-star" style="color: yellow;"></i>
                        @endfor
                        <br>
                        <input type="checkbox" wire:model="checkRating" value="5">
                        @for ($i = 0; $i < 5; $i++)
                            <i class="fa fa-star" style="color: yellow;"></i>
                        @endfor
                        <br>
                    </div>


                    <div class="form-group mb-3 text-white">
                        <label for="sort">Sort By:</label>
                        <select wire:model="sort" class="form-select" id="sort">
                            <option value="low_to_high">Price: Low to High</option>
                            <option value="high_to_low">Price: High to Low</option>
                        </select>
                    </div>

                    <button class="btn btn-info form-control" wire:click="resetFilters()">Reset Filters</button>

                </div>
            </div>
        </div>
        <div class="col md-8">
            <h3>Music Playlist</h3>
            @include('livewire.delete')
            @include('livewire.create')
            @include('livewire.edit')
            @include('livewire.view')
            <hr>
            <h6>Table count: <span class="badge badge-info">{{ $musicCount }}</span></h6>
            @if (session('message'))
                <div class="alert bg-success text-white text-center">
                    <h6>{{ session('message') }}</h6>
                </div>
            @endif
            <a href="" class="btn btn-primary d-flex justify-content-end float-end mb-3" data-toggle="modal"
                data-target="#addMusic">Add Playlist</a>
            <table class="table table-striped table-hover">
                <thead class="bg-dark">
                    <tr>
                        <th class="text-white">
                            ID.
                        </th>
                        <th class="text-white">
                            Image
                        </th>
                        <th class="text-white">
                            Title
                        </th>
                        <th class="text-white">
                            Author
                        </th>
                        <th class="text-white">
                            Location
                        </th>
                        <th class="text-white">
                            Price
                        </th>
                        <th class="text-white">
                            Genre
                        </th>
                        <th class="text-white">
                            Rating
                        </th>
                        <th class="text-white">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($musicPlaylists as $music)
                        <tr>
                            <td class="text-white">
                                {{ $music->id }}
                            </td>
                            <td>
                                <img src="{{ Storage::url($music->image) }}"
                                    style="height: 50px; width: 70px; border-radius: 14px;" alt="{{ $music->title }}">
                            </td>
                            <td class="text-white">
                                {{ $music->title }}
                            </td>
                            <td class="text-white">
                                {{ $music->author }}
                            </td>
                            <td class="text-white">
                                {{ $music->location }}
                            </td>
                            <td class="text-white">
                                {{ number_format($music->price, 2) }}
                            </td>
                            <td class="text-white">
                                {{ $music->genre }}
                            </td>
                            <td class="text-white">
                                @for ($i = 0; $i < $music->rating; $i++)
                                    <i class="fa fa-star" style="color: yellow; font-size: 11px;"></i>
                                @endfor
                            </td>
                            <td>
                                <a href="" class="btn btn-warning" data-toggle="modal"
                                    data-target="#viewMusic" wire:click="view({{ $music->id }})">View</a>
                                <a href="" class="btn btn-primary" data-toggle="modal"
                                    data-target="#updateMusic" wire:click="edit({{ $music->id }})">Update</a>
                                <a href="" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteMusic" wire:click="delete({{ $music->id }})">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    @if ($musicPlaylists->count() === 0)
                        <td colspan="9" class="text-center">No data found</td>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
