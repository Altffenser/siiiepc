<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Form extends Component
{
    use WithFileUploads;

    public Article $article;
    public $image;

    //
    protected function rules()
    {
        return [
            'image' => [
                Rule::requiredIf(!$this->article->image),
                Rule::when($this->image, ['image', 'max:2048'])
            ],
            'article.title' => ['required', 'min:4'],
            'article.slug' => [
                'required',
                'alpha_dash',
                Rule::unique('articles', 'slug')->ignore($this->article)
            ],
            'article.content' => ['required'],
        ];
    }

    //
    public function updatedArticleTitle($title)
    {
        $this->article->slug = Str::slug($title);
    }

    //
    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

        $this->validate();

        if ($this->image) {
            $this->article->image = $this->uploadImage();
        }

        Auth::user()->articles()->save($this->article);

        session()->flash('status', 'Artículo guardado correctamente!');

        $this->redirectRoute('articles.index');
    }

    public function render()
    {
        return view('livewire.article.form');
    }

    /**
     * @return mixed
     */
    public function uploadImage(): mixed
    {
        if ($oldImage = $this->article->image) {
            Storage::disk('public')->delete($oldImage);
        }

        return $this->image->store('/', 'public');
    }
}