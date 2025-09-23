<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalyst Entrepreneur Society - Transforming the Future</title>
    <meta name="description"
        content="Leading innovation and excellence in entrepreneurship, creating sustainable solutions for tomorrow's challenges.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <style>
        /* Orange theme variables */
        :root {
            --primary: 24 95% 53%;
            --primary-light: 33 100% 63%;
            --primary-dark: 16 85% 45%;
        }

        html {
            scroll-behavior: smooth;
        }

        /* Animations */
        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-50%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slideInLeft {
            animation: slideInLeft 1s ease forwards;
        }

        .animate-slideInRight {
            animation: slideInRight 1s ease forwards;
        }

        .animate-slideInDown {
            animation: slideInDown 1s ease forwards;
        }

        /* Component styles */
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .section-spacing {
            padding: 4rem 0;
        }

        @media (min-width: 768px) {
            .section-spacing {
                padding: 6rem 0;
            }
        }

        /* Logo placeholder styling */
        .logo-placeholder {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #6b7280;
        }
    </style>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Instrument Sans', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-white text-gray-900 antialiased font-sans">

    <div x-data="{
        show: @js(session()->has('status')),
        message: @js(session('status')['message'] ?? ''),
        type: @js(session('status')['type'] ?? 'success'),
        get bgColor() {
            return this.type === 'success' ? 'bg-green-500' : 'bg-red-500';
        }
    }" x-show="show" x-transition x-init="if (show) setTimeout(() => show = false, 5000)" :class="bgColor"
        class="fixed bottom-5 right-5 text-white px-4 py-2 rounded shadow-lg" style="display: none;">
        <span x-text="message"></span>
    </div>

    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-white/95 backdrop-blur-sm border-b border-gray-200 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center text-2xl font-bold">
                    <div class="mr-4">
                        <div class="w-8 h-8 rounded logo-placeholder text-xs">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo">
                        </div>
                    </div>
                    <div class="tracking-wide text-gray-900">
                        CATALYST ENTREPRENEUR SOCIETY
                    </div>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="#home" class="text-gray-700 hover:text-orange-500 transition-colors">Home</a>
                    <a href="#about" class="text-gray-700 hover:text-orange-500 transition-colors">About</a>
                    <a href="#vision" class="text-gray-700 hover:text-orange-500 transition-colors">Vision</a>
                    <a href="#team" class="text-gray-700 hover:text-orange-500 transition-colors">Team</a>
                    <a href="#contact" class="text-gray-700 hover:text-orange-500 transition-colors">Contact</a>
                    <a href="{{ route('login') }}"
                        class="text-gray-700 hover:text-orange-500 transition-colors">Login</a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button class="text-gray-700 hover:text-orange-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home"
        class="relative min-h-screen flex items-center justify-start bg-gradient-to-br from-orange-400 to-orange-500 overflow-hidden">
        {{-- Hero background image --}}
        @if (!empty($hero) && !empty($hero->background_image))
            <img src="{{ asset('storage/' . $hero->background_image) }}" alt="Hero Background"
                class="absolute inset-0 w-full h-full object-cover z-0 opacity-70">
        @endif

        <!-- Gradient overlay -->
        <div
            class="absolute inset-0 bg-gradient-to-br from-orange-400 {{ !empty($hero) && !empty($hero->background_image) ? 'opacity-60' : 'opacity-100' }} z-0">
        </div>

        <div class="relative z-10 text-white px-6 md:px-20 max-w-4xl">
            <!-- Logo Section -->
            <div class="flex justify-start mb-6">
                <div class="w-20 h-20 rounded-lg logo-placeholder text-sm text-gray-600">
                    @if (file_exists(public_path('images/logo.png')))
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                    @else
                        <div class="w-full h-full bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <span class="text-white text-xs font-bold">LOGO</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Title Section -->
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 uppercase tracking-wide leading-tight">
                @if (!empty($hero) && !empty($hero->title))
                    {{ $hero->title }}
                @else
                    Welcome to Our Company
                @endif
            </h1>

            <!-- Subtitle Section -->
            <p class="text-xl md:text-2xl mb-8 opacity-90 max-w-2xl">
                @if (!empty($hero) && !empty($hero->subtitles))
                    {{ $hero->subtitles }}
                @else
                    Discover amazing solutions and services tailored to your needs. We're here to help you succeed.
                @endif
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#about"
                    class="bg-white text-orange-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors text-center">
                    @if (!empty($hero) && !empty($hero->primary_button_text))
                        {{ $hero->primary_button_text }}
                    @else
                        Learn More
                    @endif
                </a>
                <a href="#contact"
                    class="border border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-orange-600 transition-colors text-center">
                    @if (!empty($hero) && !empty($hero->secondary_button_text))
                        {{ $hero->secondary_button_text }}
                    @else
                        Get Started
                    @endif
                </a>
            </div>
        </div>

        <!-- Decorative elements -->
        <div class="absolute bottom-10 right-10 flex space-x-2">
            <div class="w-4 h-4 bg-red-400 rounded-full opacity-70"></div>
            <div class="w-4 h-4 bg-orange-400 rounded-full opacity-70"></div>
            <div class="w-8 h-8 bg-white rounded-full opacity-30"></div>
        </div>
        <div class="absolute bottom-0 left-0 w-1/3 h-24 bg-orange-600 opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-1/4 h-32 bg-orange-600 opacity-30 rounded-t-full"></div>
    </section>

    <!-- About Section -->
    <section id="about" class="relative bg-gradient-to-r from-orange-500 to-orange-400 py-16 px-6 overflow-hidden">
        <div class="max-w-6xl mx-auto flex flex-col lg:flex-row items-center gap-8">
            <!-- Left Circle Label -->
            <div
                class="flex-shrink-0 w-48 h-48 bg-gradient-to-b from-orange-600 to-orange-500 rounded-full flex items-center justify-center text-center text-white font-bold text-xl shadow-lg animate-slideInLeft">
                <div class="px-4">
                    <span class="block">About</span>
                    <span class="block">CES</span>
                </div>
            </div>

            <!-- Divider Line -->
            <div class="hidden lg:block w-1 h-40 bg-white mx-6 animate-slideInDown"></div>

            <!-- Right Content -->
            <div class="text-white animate-slideInRight flex-1">
                <h2 class="text-3xl font-bold mb-6 lg:hidden">About CES</h2>
                <p class="leading-relaxed text-lg mb-4">
                    The Catalyst Entrepreneurs Society is an innovative concept-based investor group with a broad
                    scope for engaging in various business segments. This group is dedicated to inspiring and
                    supporting young, innovative individuals in the business and entrepreneurial sectors.
                </p>
                <p class="leading-relaxed text-lg">
                    The introduction of the Catalyst Entrepreneurs Society is a novel concept within our community,
                    and its potential long-term impact on our society is significant. The society aims to establish
                    an extensive entrepreneurial network throughout the country, fostering collaboration and
                    innovation on a national scale.
                </p>
            </div>
        </div>
    </section>


    <section class="p-6 bg-white shadow rounded max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Scopes of Catalyst Entrepreneurs Society</h2>
        <ul class="list-disc pl-6 space-y-2 text-gray-700">
            @foreach ($scopes as $scope)
                <li>
                    @if ($scope->link)
                        <a href="{{ $scope->link }}" target="_blank" class="text-blue-600 hover:underline">
                            {{ $scope->title }}
                        </a>
                    @else
                        {{ $scope->title }}
                    @endif
                </li>
            @endforeach
        </ul>
    </section>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">CES Details</h1>

        @if ($detail)
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <div class="mb-3">
                        <span class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-3 py-1 rounded">
                            DAO Registration Number
                        </span>
                        <span class="ml-2">{{ $detail->dao_registration_number ?? 'Not available' }}</span>
                    </div>
                    <div class="mb-3">
                        <span class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-3 py-1 rounded">
                            Established Date
                        </span>
                        <span class="ml-2">{{ $detail->established_date ?? 'Not available' }}</span>
                    </div>
                    <div class="mb-3">
                        <span class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-3 py-1 rounded">
                            SWC Affiliation Number
                        </span>
                        <span class="ml-2">{{ $detail->swc_affiliation_number ?? 'Not available' }}</span>
                    </div>
                </div>
                <div>
                    <div class="mb-3">
                        <span class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-3 py-1 rounded">
                            PAN No.
                        </span>
                        <span class="ml-2">{{ $detail->pan_number ?? 'Not available' }}</span>
                    </div>
                    <div class="mb-3">
                        <span class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-3 py-1 rounded">
                            Number of Founding Members
                        </span>
                        <span class="ml-2">{{ $detail->founding_members ?? 'Not available' }}</span>
                    </div>
                    <div class="mb-3">
                        <span class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-3 py-1 rounded">
                            Total No. of Members
                        </span>
                        <span class="ml-2">{{ $detail->total_members ?? 'Not available' }}</span>
                    </div>
                </div>
            </div>

            <a href="{{ route('ces.edit', $detail) }}"
                class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">
                Edit Details
            </a>
        @else
            <p class="text-gray-600 italic">No CES details found.</p>
        @endif
    </div>



    <!-- Mission, Vision, Goals Section -->
    <section id="vision" class="section-spacing bg-orange-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-orange-600 mb-4">Our Foundation</h2>
                <p class="text-lg text-gray-600">The principles that drive everything we do</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Mission -->
                <div class="card-hover rounded-lg border bg-white shadow-sm text-center p-8">
                    <div class="mx-auto mb-4 p-4 bg-orange-100 rounded-full w-fit">
                        <svg class="h-8 w-8 text-orange-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="12" r="6"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                        </svg>
                    </div>
                    <h3 class="text-2xl text-orange-600 font-semibold mb-4">Mission</h3>
                    <p class="text-gray-600">
                        To empower organizations with innovative strategies and sustainable solutions that drive
                        meaningful change and create lasting value for all stakeholders.
                    </p>
                </div>

                <!-- Vision -->
                <div class="card-hover rounded-lg border bg-white shadow-sm text-center p-8">
                    <div class="mx-auto mb-4 p-4 bg-orange-100 rounded-full w-fit">
                        <svg class="h-8 w-8 text-orange-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                    <h3 class="text-2xl text-orange-600 font-semibold mb-4">Vision</h3>
                    <p class="text-gray-600">
                        To be the global leader in organizational transformation, fostering a world where businesses
                        thrive while contributing positively to society and the environment.
                    </p>
                </div>

                <!-- Goals -->
                <div class="card-hover rounded-lg border bg-white shadow-sm text-center p-8">
                    <div class="mx-auto mb-4 p-4 bg-orange-100 rounded-full w-fit">
                        <svg class="h-8 w-8 text-orange-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="7"></circle>
                            <polyline points="8.21,13.89 7,23 12,20 17,23 15.79,13.88"></polyline>
                        </svg>
                    </div>
                    <h3 class="text-2xl text-orange-600 font-semibold mb-4">Goals</h3>
                    <p class="text-gray-600">
                        To achieve excellence in service delivery, maintain 100% client satisfaction, and expand our
                        positive impact to 1000+ organizations worldwide by 2030.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Objectives Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-orange-600 mb-4">Our Objectives</h2>
                <p class="text-lg text-gray-600">Strategic priorities for organizational excellence</p>
            </div>

            <!-- Objectives Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach ($objectives as $objective)
                    <div class="rounded-lg border bg-white shadow-sm p-6 hover:shadow-lg transition">
                        <!-- Logo SVG -->
                        <svg class="h-10 w-10 text-orange-500 mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            @php
                                // Define logos array
                                $logos = [
                                    'target' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />',
                                    'growth' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18" />',
                                    'teamwork' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87" />',
                                    'innovation' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m0 14v1m8-8h1M4 12H3m15.364 6.364l.707.707M6.343 6.343l-.707-.707" />',
                                    'education' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />',
                                    'health' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21C12 21 4 13 4 8a4 4 0 018 0 4 4 0 018 0c0 5-8 13-8 13z" />',
                                    'sustainability' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />',
                                    'leadership' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.908c.969 0 1.371 1.24.588 1.81l-3.97 2.886a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.97-2.886a1 1 0 00-1.176 0l-3.97 2.886c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.364-1.118l-3.97-2.886c-.783-.57-.38-1.81.588-1.81h4.908a1 1 0 00.95-.69l1.518-4.674z" />',
                                    'technology' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17a4.25 4.25 0 118.5 0v1.25a2.75 2.75 0 01-2.75 2.75H12.5a2.75 2.75 0 01-2.75-2.75V17z" />',
                                    'finance' =>
                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V4m0 16v-4" />',
                                ];
                                // Use selected logo or fallback to 'target'
                                echo $logos[$objective->logo ?? 'target'] ?? $logos['target'];
                            @endphp
                        </svg>

                        <h3 class="text-lg font-gray-900 mb-2">{{ $objective->content }}</h3>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Team Members Section -->
    <section id="team" class="section-spacing bg-orange-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-orange-600 mb-4">Meet Our Team</h2>
                <p class="text-lg text-gray-600">The passionate professionals driving our success</p>
            </div>

            <!-- Note: This section would need to be populated with actual team data -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($members as $member)
                    <div class="card-hover rounded-lg border bg-white shadow-sm text-center p-8">
                        <div class="mx-auto mb-4">
                            <div
                                class="w-24 h-24 rounded-full bg-gray-200 mx-auto border-4 border-orange-200 overflow-hidden">
                                <img src="{{ asset('storage/' . $member->profile_picture) }}" alt="Team Member Image"
                                    class="w-full h-full object-cover rounded-full">
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{ $member->name }}</h3>
                        <p class="text-orange-600 font-semibold text-sm">{{ $member->role }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section-spacing bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-orange-600 mb-4">Get in Touch</h2>
                <p class="text-lg text-gray-600">Ready to transform your organization? Let's start the conversation.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="card-hover rounded-lg border bg-white shadow-sm p-8">
                    <h3 class="text-2xl text-orange-600 font-semibold mb-4">Send Us a Message</h3>
                    <p class="text-sm text-gray-600 mb-6">We'll get back to you within 24 hours</p>

                    <form action="{{ route('contact.send') }}" method="POST" onsubmit="return confirmSendMessage()"
                        class="space-y-4">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm font-medium text-gray-700 block mb-1">First Name</label>
                                <input type="text" name="first_name" placeholder="John"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-700 block mb-1">Last Name</label>
                                <input type="text" name="last_name" placeholder="Doe"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700 block mb-1">Email</label>
                            <input type="email" name="email" placeholder="john@example.com"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700 block mb-1">Company</label>
                            <input type="text" name="company" placeholder="Your Company"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700 block mb-1">Message</label>
                            <textarea name="message" placeholder="Tell us about your project..." rows="4"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent h-32"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-orange-500 text-white py-3 px-4 rounded-md hover:bg-orange-600 transition-colors font-semibold">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-6">
                    <div class="card-hover rounded-lg border bg-white shadow-sm p-6">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-orange-100 rounded-full">
                                <svg class="h-6 w-6 text-orange-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Contact Us</h3>
                                <a href="https://www.cesnepal.org" target="_blank" class="hover:underline">
                                    www.cesnepal.org
                                </a>
                                <p class="text-gray-600">cesnepal2080@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-hover rounded-lg border bg-white shadow-sm p-6">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-orange-100 rounded-full">
                                <svg class="h-6 w-6 text-orange-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Call Us</h3>
                                <p class="text-gray-600">+977 981-4099804</p>
                                <p class="text-gray-600">+977 980-1444218</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-hover rounded-lg border bg-white shadow-sm p-6">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-orange-100 rounded-full">
                                <svg class="h-6 w-6 text-orange-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Visit Us</h3>
                                <p class="text-gray-600">Birtamode Municpaltity<br>Jhapa,Nepal</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-orange-500 to-orange-600 text-white rounded-lg shadow-sm p-6">
                        <h3 class="font-semibold text-xl mb-2">Ready to Get Started?</h3>
                        <p class="mb-4 opacity-90">
                            Schedule a free consultation to discuss your organization's goals and how we can help
                            achieve them.
                        </p>
                        <button
                            class="bg-white text-orange-600 px-6 py-2 rounded-md hover:bg-gray-100 transition-colors font-semibold">
                            Schedule Consultation
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="container mx-auto px-6 py-12">
            <div class="text-center">
                <div class="text-2xl font-bold text-orange-500 mb-4">Catalyst Entrepreneur Society</div>
                <p class="text-gray-400 mb-4">Transforming organizations for a better tomorrow</p>
                <div class="flex justify-center space-x-6 mb-6">
                    <a href="#" class="text-gray-400 hover:text-orange-500 transition-colors">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-orange-500 transition-colors">Terms of
                        Service</a>
                    <a href="#" class="text-gray-400 hover:text-orange-500 transition-colors">Support</a>
                </div>
                <p class="text-sm text-gray-500">&copy; 2024 Catalyst Entrepreneur Society. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const headerOffset = 80;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Mobile menu toggle (if you want to add mobile menu functionality)
        const mobileMenuButton = document.querySelector('button');
        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', function() {
                // Add mobile menu toggle logic here
                console.log('Mobile menu clicked');
            });
        }

        function confirmSendMessage() {
            if (confirm("Are you sure you want to send this message?")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>
