<?php


namespace App\Http\View\Composers;

use App\DocumentType;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CachedDocumentType
{

    protected $documentType;


    /**
     * CachedDocumentType constructor.
     * @param DocumentType $documentType
     */
    public function __construct(DocumentType $documentType)
    {
        // Dependencies automatically resolved by service container...
        $this->documentType = $documentType;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('documentTypes', Cache::remember('documentTypes.enable', 600, function () {
            return $this->documentType->all();
        }));
    }

}
