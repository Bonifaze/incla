<?php

namespace App\Http\Controllers;

use App\Models\Cmsnew;
use App\Models\CmsEvent;
use App\Models\CmsSlider;
use Illuminate\Http\Request;
use App\Models\CmsStudentrep;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class WebsiteController extends Controller
{
    public function slider()
    {
        // $this->authorize('main',College::class);
        $sliders = CmsSlider::where('type', 'main')->latest()->take(6)->get();
        return view('website.slider', compact('sliders'));
    }
    public function sliderSRA()
    {
        $this->authorize('sra',College::class);
        $sliders = CmsSlider::where('type', 'sra')->latest()->take(6)->get();
        return view('website.sliderSRA', compact('sliders'));
    }

    public function sliderNFCS()
    {
        $this->authorize('nfcs',College::class);
        $sliders = CmsSlider::where('type', 'nfcs')->latest()->take(6)->get();
        return view('website.sliderNFCS', compact('sliders'));
    }

    public function events()
    {
        $this->authorize('list',College::class);
        $events = CmsEvent::where('type', 'main')->latest()->take(6)->get();
        return view('website.event', compact('events'));
    }

    public function eventsSRA()
    {
        $this->authorize('list',College::class);
        $events = CmsEvent::where('type', 'sra')->latest()->take(6)->get();
        return view('website.eventSRA', compact('events'));
    }
    public function eventsNFCS()
    {
        $this->authorize('list',College::class);
        $events = CmsEvent::where('type', 'nfcs')->latest()->take(6)->get();
        return view('website.eventNFCS', compact('events'));
    }
    public function sliderupdate(Request $request, $id)
    {
        $this->authorize('list',College::class);
        // Validate the incoming request data
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif', // Adjust the validation rules based on your requirements
            'title' => 'required|string|max:255',
            'text' => 'required|string',
        ]);

        // Find the slider by ID
        $slider = CmsSlider::findOrFail($id);

        // Update the text
        $slider->title = $request->input('title');
        $slider->text = $request->input('text');

        // Update the image if a new one is provided

        if($request->hasFile('image'))
        {
            $img1 = Image::make($request->file('image'));
            $slider->image = $img1->encode()->encoded;

        }

        // Save the changes
    $slider->save();
        // dd( $slider);
        return redirect()->back()->with('success', 'Slider updated successfully!');
    }

    protected $slider;
    protected $news;


    public function __construct(CmsSlider $slider, CmsNew $news)
    {
        $this->slider = $slider;
        $this->news = $news;
    }



    public function sliderstore(Request $request)
    {
        $this->authorize('list',College::class);
        // Validate the request
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:255',
        ]);

        // Create a new Slider instance
        $this->slider->text = $validatedData['text'];
        $this->slider->title = $validatedData['title'];
        $this->slider->type = $request->input('type', ''); // Set a default value if 'type' is not provided

        if($request->hasFile('image'))
        {
            $img1 = Image::make($request->file('image'));
            $this->slider->image = $img1->encode()->encoded;

        }

        // Save the slider to the database
        $this->slider->save();

        return redirect()->back()->with('success', 'Slider added successfully!');
    }

    // NEWS SECTION

    public function news()
    {
        $this->authorize('list',College::class);
        $news = CmsNew::where('type', 'main')->latest()->take(6)->get();
        return view('website.news', compact('news'));
    }

      public function newsSRA()
    {
        $this->authorize('list',College::class);
        $news = CmsNew::where('type', 'sra')->latest()->take(6)->get();
        return view('website.newsSRA', compact('news'));
    }
      public function newsNFCS()
    {
        $this->authorize('list',College::class);
        $news = CmsNew::where('type', 'nfcs')->latest()->take(6)->get();
        return view('website.newsNFCS', compact('news'));
    }
    public function newsupdate(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif', //
            'title' => 'required|string',
            'text' => 'required|string',
        ]);

        // Find the slider by ID
        $news = CmsNew::findOrFail($id);

        // Update the text
        $news->text = $request->input('text');
        $news->title = $request->input('title');

        // Update the image if a new one is provided

        if($request->hasFile('image'))
        {
            $img1 = Image::make($request->file('image'));
            $news->image = $img1->encode()->encoded;


        }

        // Save the changes
    $news->save();
        // dd( $slider);
        return redirect()->back()->with('success', 'News updated successfully!');
    }


    public function newsstore(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        // Create a new News instance
        $this->news->type = $validatedData['type'];
        $this->news->text = $validatedData['text'];
        $this->news->title = $validatedData['title'];


        if($request->hasFile('image'))
        {
            $img1 = Image::make($request->file('image'));
            $this->news->image = $img1->encode()->encoded;

        }

        // Save the news to the database
        $this->news->save();

        return redirect()->back()->with('success', 'News added successfully!');
    }


//EVENT
public function eventstore(Request $request){
    $request->validate([

    'title' => 'required|string|max:255',
            'text' => 'required|string|max:255',
            'type' => 'required|string|max:255',
      ]);
  $event = new CmsEvent();
  $event->title = $request->title;
  $event->text = $request->text;
  $event->type = $request->type;


  try{
      $event->save();
  } // end try
  catch(\Exception $e)
  {
      $request->session()->flash('error', 'Error creating event ! <br />');
      return redirect()->back()->with('success', 'Event added successfully!');
     }

     return redirect()->back()->with('success', 'Event added successfully!');
}  // end store


public function eventupdate(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([

        'title' => 'required|string',
        'text' => 'required|string',
    ]);

    // Find the slider by ID
    $event = CmsEvent::findOrFail($id);

    // Update the text
    $event->text = $request->input('text');
    $event->title = $request->input('title');

    // Update the image if a new one is provided



    // Save the changes
    $event->save();
    // dd( $slider);
    return redirect()->back()->with('success', 'Event updated successfully!');
}


public function schedulestore(Request $request){
    $request->validate([

    'title' => 'required|string|max:255',
            'text' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
            'type' => 'required|string|max:255',
      ]);
  $event = new CmsStudentrep();
  $event->title = $request->title;
  $event->text = $request->text;
  $event->semester = $request->semester;
  $event->date = $request->date;
  $event->type = $request->type;


  try{
      $event->save();
  } // end try
  catch(\Exception $e)
  {
      $request->session()->flash('error', 'Error creating event ! <br />');
      return redirect()->back()->with('success', 'Event added successfully!');
     }

     return redirect()->back()->with('success', 'Schedule added successfully!');
}  // end store


public function scheduleupdate(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([

        'title' => 'required|string',
        'text' => 'required|string',
    ]);

    // Find the slider by ID
    $event = CmsStudentrep::findOrFail($id);

    // Update the text
    $event->text = $request->input('text');
    $event->title = $request->input('title');
    $event->semester = $request->input('semester');
    $event->date = $request->input('date');



    // Update the image if a new one is provided



    // Save the changes
    $event->save();
    // dd( $slider);
    return redirect()->back()->with('success', 'Schedule updated successfully!');
}

}
