@extends('landingpage.index')
@section('content')
<!-- ====== Banner Section Start -->
<div class="relative z-10 overflow-hidden bg-primary pt-[120px] pb-[100px] md:pt-[130px] lg:pt-[160px]">
    <div class="container">
        <div class="-mx-4 flex flex-wrap items-center">
            <div class="w-full px-4">
                <div class="text-center">
                    <h1 class="text-4xl font-semibold text-white">Pricing Page</h1>
                </div>
            </div>
        </div>
    </div>
    <div>
        <span class="absolute top-0 left-0 z-[-1]">
            <svg width="495" height="470" viewBox="0 0 495 470" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="55" cy="442" r="138" stroke="white" stroke-opacity="0.04" stroke-width="50" />
                <circle cx="446" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20" />
                <path d="M245.406 137.609L233.985 94.9852L276.609 106.406L245.406 137.609Z" stroke="white" stroke-opacity="0.08" stroke-width="12" />
            </svg>
        </span>
        <span class="absolute top-0 right-0 z-[-1]">
            <svg width="493" height="470" viewBox="0 0 493 470" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="462" cy="5" r="138" stroke="white" stroke-opacity="0.04" stroke-width="50" />
                <circle cx="49" cy="470" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20" />
                <path d="M222.393 226.701L272.808 213.192L259.299 263.607L222.393 226.701Z" stroke="white" stroke-opacity="0.06" stroke-width="13" />
            </svg>
        </span>
    </div>
</div>
<!-- ====== Banner Section End -->

<!-- ====== Pricing Section Start -->
<section id="pricing" class="relative z-20 overflow-hidden bg-white pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
    <div class="container">
        <div class="-mx-4 flex flex-wrap">
            <div class="w-full px-4">
                <div class="mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20">
                    <span class="mb-2 block text-lg font-semibold text-primary">
                        Pricing Table
                    </span>
                    <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px]">
                        Our Pricing Plan
                    </h2>
                    <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
                        There are many variations of passages of Lorem Ipsum available
                        but the majority have suffered alteration in some form.
                    </p>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap items-center justify-center">
            <div class="w-full md:w-1/2 lg:w-1/3">
                <div class="wow fadeInUp relative z-10 mb-10 overflow-hidden rounded-xl border border-primary border-opacity-20 bg-white py-10 px-8 text-center shadow-pricing sm:p-12 lg:py-10 lg:px-6 xl:p-12" data-wow-delay=".15s
              ">
                    <span class="mb-2 block text-base font-medium uppercase text-dark">
                        STARTING FROM
                    </span>
                    <h2 class="mb-9 text-[28px] font-semibold text-primary">
                        $ 19.99/mo
                    </h2>

                    <div class="mb-10">
                        <p class="mb-1 text-base font-medium leading-loose text-body-color">
                            1 User
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-body-color">
                            All UI components
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-body-color">
                            Lifetime access
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-body-color">
                            Free updates
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-body-color">
                            Use on 1 (one) project
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-body-color">
                            3 Months support
                        </p>
                    </div>
                    <div class="w-full">
                        <a href="javascript:void(0)" class="inline-block rounded-full border border-[#D4DEFF] bg-transparent py-4 px-11 text-center text-base font-medium text-primary transition duration-300 ease-in-out hover:border-primary hover:bg-primary hover:text-white">
                            Purchase Now
                        </a>
                    </div>
                    <span class="absolute left-0 bottom-0 z-[-1] block h-14 w-14 rounded-tr-full bg-primary">
                    </span>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3">
                <div class="wow fadeInUp relative z-10 mb-10 overflow-hidden rounded-xl bg-primary bg-gradient-to-b from-primary to-[#179BEE] py-10 px-8 text-center shadow-pricing sm:p-12 lg:py-10 lg:px-6 xl:p-12" data-wow-delay=".1s
              ">
                    <span class="mb-5 inline-block rounded-full border border-white bg-white py-2 px-6 text-base font-semibold uppercase text-primary">
                        POPULAR
                    </span>
                    <span class="mb-2 block text-base font-medium uppercase text-white">
                        STARTING FROM
                    </span>
                    <h2 class="mb-9 text-[28px] font-semibold text-white">
                        $ 19.99/mo
                    </h2>

                    <div class="mb-10">
                        <p class="mb-1 text-base font-medium leading-loose text-white">
                            5 User
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-white">
                            All UI components
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-white">
                            Lifetime access
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-white">
                            Free updates
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-white">
                            Use on 1 (one) project
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-white">
                            4 Months support
                        </p>
                    </div>
                    <div class="w-full">
                        <a href="javascript:void(0)" class="inline-block rounded-full border border-white bg-white py-4 px-11 text-center text-base font-medium text-dark transition duration-300 ease-in-out hover:border-dark hover:bg-dark hover:text-white">
                            Purchase Now
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3">
                <div class="wow fadeInUp relative z-10 mb-10 overflow-hidden rounded-xl border border-primary border-opacity-20 bg-white py-10 px-8 text-center shadow-pricing sm:p-12 lg:py-10 lg:px-6 xl:p-12" data-wow-delay=".15s
              ">
                    <span class="mb-2 block text-base font-medium uppercase text-dark">
                        STARTING FROM
                    </span>
                    <h2 class="mb-9 text-[28px] font-semibold text-primary">
                        $ 70.99/mo
                    </h2>

                    <div class="mb-10">
                        <p class="mb-1 text-base font-medium leading-loose text-body-color">
                            1 User
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-body-color">
                            All UI components
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-body-color">
                            Lifetime access
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-body-color">
                            Free updates
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-body-color">
                            Use on unlimited project
                        </p>
                        <p class="mb-1 text-base font-medium leading-loose text-body-color">
                            4 Months support
                        </p>
                    </div>
                    <div class="w-full">
                        <a href="javascript:void(0)" class="inline-block rounded-full border border-[#D4DEFF] bg-transparent py-4 px-11 text-center text-base font-medium text-primary transition duration-300 ease-in-out hover:border-primary hover:bg-primary hover:text-white">
                            Purchase Now
                        </a>
                    </div>

                    <span class="absolute right-0 top-0 z-[-1] block h-14 w-14 rounded-bl-full bg-secondary">
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== Pricing Section End -->
@endsection