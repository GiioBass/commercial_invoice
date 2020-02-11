<?php

namespace App\Http\View\Composers;

use App\Product;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class CachedProducts
{
    /**
     * The user repository implementation.
     *
     * @var Product
     */
    protected $product;

    /**
     * Create a new profile composer.
     *
     * @param  Product  $product
     * @return void
     */
    public function __construct(Product $product)
    {
        // Dependencies automatically resolved by service container...
        $this->product = $product;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('product', Cache::remember('product', 600, function () {
            return $this->product->all();
        }));
    }
}
