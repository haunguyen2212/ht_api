<?php

namespace App\Http\Controllers;

use App\Repositories\FAQRepository;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    protected FAQRepository $faq;

    public function __construct(
        FAQRepository $faqRepository
    )
    {
        $this->faq = $faqRepository;
    }

    public function index(){
        $faqs = $this->faq->getAll();
        return response()->json(['data' => $faqs, 'message' => 'Success']);
    }
}
