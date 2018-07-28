<?php namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;

/**
 * AnotherController
 * @package App\Http\Controllers\Sample
 * @author  Gabriel Lucernas Pascual <ghabxph.official@gmail.com>
 * @since   2018.07.28
 */
class AnotherController extends Controller
{

    /**
     * Displays "Hello sa inyo"
     *
     * @return string
     */
    public function showSamplePage()
    {
        return 'Hello sa inyo';
    }
}
