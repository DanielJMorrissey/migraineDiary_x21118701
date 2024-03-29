@extends('layout')
@section('title')
    <title>
        Migraine Diary - Home
    </title>
@endsection
@section('maincontent')
    <main>
        {{-- 
            homepage to provide info on what migraines are, how to use this web app, how to treat migraines and the triggers 
        --}}
        <div class="container">
            <div id="firstDiv" class="row d-flex align-items-center justify-content-center" style="display:none;text-align: justify;">
                <img src="{{ asset('images/migraineDiary.jpg') }}" alt="Image of a person writing in a diary" class="col-lg-3" />
                <p class="col-lg-8">
                    Welcome to this Online Migraine Diary! Here, you can create a diary of information to determine any possible triggers for your migraine. There are extra features such as a GP tracker and simple analysis of your migraine diary to aid in your identification of triggers for your migraine.<br/><br/>
                    All you need to do is to simply log in or register an account with the links above and navigate to the feature you want. If you want to add a diary entry, just click the button near the top an fill in the form and submit. The same process for adding new GP visits. The analysis feature will provide a list of common triggers and the proportion, in percentages, of migraines that followed that trigger. Just remember that the <b>day before</b> needs to be considered for today's migraine! Use the comments field to provide additional information.
                </p>
                
            </div>
            <hr />
            <div id="secondDiv" class="row d-flex align-items-center" style="display:none;">
                <p class="col-lg-8" style="text-align: justify;">
                    A migraine is a headache that ranges from moderate to severe with the pain being felt as throbbing. Migraines are usually felt on one side of the head and usually last from a few hours to 3 days. Migraines either come with a warning sign, no warning signs or even a warning sign with no headache. Warning signs, often called aura, vary from visual problems to numbness in the arm. Often there are other symptoms such as nausea and vomiting or even sweating.<br/><br/>
                    For more information go to the <a href="https://www.nhs.uk/conditions/migraine/">NHS website</a> or your GP for more information. 
                </p>
                <img src="{{ asset('images/headache.jpg') }}" alt="Image of man putting his hands to his face" class="col-lg-3" />
            </div>
            <hr />
            <div id="thirdDiv" class="row d-flex align-items-center" style="display:none;">
                <img class="col-lg-3" src="{{ asset('images/medication.jpg') }}" alt="Image of medication on a table with a medication bottle" />
                <p class="col-lg-8" style="text-align: justify;">
                    There is a number of treatments for migraines. One of the most common ways to treating a migraine is the use of painkillers such as <i>ibuprofen</i> or <i>paracetamol</i> to ease the headache or to relieve a person from their migraine the use of a triptan. Other medications such as anti-nausea medication can be used for other symptoms. <br/><br/>
                    For more information go to the <a href="https://www.nhs.uk/conditions/migraine/treatment/">NHS migraine treatment page</a> or your GP for more information.
                </p>
            </div>
            <hr />
            <div id="fourthDiv" class="row d-flex align-items-center" style="display:none;">
                <p class="col-lg-8">
                    There are a number of things that can be considered a trigger. These triggers can consist of being stressed, not drinking enough water, chocolate, cheese among others. A bigger list can be found <a href="https://www.webmd.com/migraines-headaches/migraine-trigger-foods">here</a>, when you add a new diary entry or from your GP. Use the comment section of the diary entry if you do not see a dietary item or some other aspect of your lifestyle that is not listed when adding a new diary entry.
                </p>
                <img src="{{ asset('images/water.jpg') }}" alt="Image of a person serving a glass of water" class="col-lg-3" />
            </div>
            <small>
                Images obtained from: <a href="https://burst.shopify.com/">Shopify</a>
            </small>
        </div>
    </main>
@endsection