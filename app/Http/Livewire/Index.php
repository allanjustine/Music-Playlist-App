<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MusicBar;
use Livewire\WithFileUploads;

class Index extends Component
{

    public $search;
    public $checkGenre = [];
    public $selectLocation = 'All';
    public $sort = 'low_to_high';
    public $checkRating = [];
    public $musicDelete;

    public $image, $title, $description, $author, $genre, $location, $rating, $price;
    public $musicEdit;
    public $musicView;
    public $musicView_image, $musicView_description, $musicView_title, $musicView_location, $musicView_author, $musicView_price, $musicView_rating, $musicView_genre;

    use WithFileUploads;

    public function addMusic()
    {
        $this->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'location' => 'required',
            'rating' => 'required|numeric|min:0|max:10',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|max:1024'
        ]);

        $path = $this->image->store('public/images');

        $music = MusicBar::create([
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description,
            'genre' => $this->genre,
            'location' => $this->location,
            'rating' => $this->rating,
            'price' => $this->price,
            'image' => $path
        ]);

        $this->reset([
            'title',
            'author',
            'description',
            'genre',
            'location',
            'rating',
            'price',
            'image'
        ]);

        return redirect('/')->with('message', 'Music added to playlist');

        compact('music');
    }

    public function loadMusicPlaylist()
    {
        $query = MusicBar::search($this->search);

        if (!empty($this->checkGenre)) {
            $query->whereIn('genre', $this->checkGenre);
        }

        if ($this->selectLocation != 'All') {
            $query->where('location', $this->selectLocation);
        }

        if (!empty($this->checkRating)) {
            $query->whereIn('rating', $this->checkRating);
        }

        if ($this->sort === 'low_to_high') {
            $query->orderBy('price', 'asc');
        } else {
            $query->orderBy('price', 'desc');
        }

        $musicPlaylists = $query->get();

        $musicCount = $query->count();

        return compact('musicPlaylists', 'musicCount');
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->checkGenre = [];
        $this->selectLocation = 'All';
        $this->sort = 'low_to_high';
        $this->checkRating = [];
    }

    public function delete($musicId)
    {
        $this->musicDelete = $musicId;
    }

    public function resetInputs()
    {
        $this->title = '';
        $this->author = '';
        $this->description = '';
        $this->genre = '';
        $this->location = '';
        $this->rating = '';
        $this->price = null;
        $this->image = '';
    }

    protected $rules = [
        'title' => 'required',
        'author' => 'required',
        'description' => 'required',
        'genre' => 'required',
        'location' => 'required',
        'rating' => 'required|numeric|min:0|max:10',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:1024'
    ];

    public function edit($id)
    {
        $this->musicEdit = MusicBar::find($id);
        $this->title = $this->musicEdit->title;
        $this->author = $this->musicEdit->author;
        $this->description = $this->musicEdit->description;
        $this->genre = $this->musicEdit->genre;
        $this->location = $this->musicEdit->location;
        $this->rating = $this->musicEdit->rating;
        $this->price = $this->musicEdit->price;
        $this->image = null;
    }

    public function update()
    {
        $this->validate();

        $this->musicEdit->update([
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description,
            'genre' => $this->genre,
            'location' => $this->location,
            'rating' => $this->rating,
            'price' => $this->price,
            'image' => $this->image ? $this->image->store('public/images') : $this->musicEdit->image
        ]);

        $this->reset();
        return redirect('/')->with('message', 'Music updated successfully.');
    }

    public function view($id)
    {
        $musicView = MusicBar::where('id', $id)->first();

        $this->musicView_image = $musicView->image;
        $this->musicView_description = $musicView->description;
        $this->musicView_title = $musicView->title;
        $this->musicView_author = $musicView->author;
        $this->musicView_price = $musicView->price;
        $this->musicView_location = $musicView->location;
        $this->musicView_rating = $musicView->rating;
        $this->musicView_genre = $musicView->genre;
    }

    function closeView()
    {
        $this->musicView_image = null;
        $this->musicView_description = '';
        $this->musicView_title = '';
        $this->musicView_author = '';
        $this->musicView_price = null;
        $this->musicView_location = '';
        $this->musicView_rating = '';
        $this->musicView_genre = '';
    }

    public function deleteMusic()
    {
        MusicBar::find($this->musicDelete)->delete();

        return redirect('/')->with('message', 'Music is deleted successfully');
    }
    public function render()
    {
        return view('livewire.index', $this->loadMusicPlaylist());
    }
}
