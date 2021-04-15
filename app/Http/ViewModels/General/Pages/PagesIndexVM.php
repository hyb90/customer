<?php


namespace App\Http\ViewModels\General\Pages;


use App\Domain\General\Pages\Model\Page;
use Illuminate\Contracts\Support\Arrayable;

class PagesIndexVM implements Arrayable
{
    private $pages ;

    public function __construct()
    {
        $this->pages = array();
        $pages = Page::all();
        foreach ($pages as $page){
            $formatted_page = new ShowPageVM($page);
            array_push($this->pages,$formatted_page->toArray()['page']);
        }
    }

    public function toArray()
    {
        return [
            'pages' => $this->pages
        ];
    }

}
