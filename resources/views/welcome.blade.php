<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

    <title>OrganiCorp - Transforming the Future</title>
    <meta name="description"
        content="Leading innovation and excellence in organizational development, creating sustainable solutions for tomorrow's challenges.">
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script> --}}

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS with Orange Theme Design System -->
    <style>
        /* Orange theme design system - All colors MUST be HSL */
        :root {
            /* Orange theme palette */
            --background: 0 0% 100%;
            --foreground: 221 39% 11%;
            --card: 0 0% 100%;
            --card-foreground: 221 39% 11%;
            --popover: 0 0% 100%;
            --popover-foreground: 221 39% 11%;

            /* Orange primary colors */
            --primary: 24 95% 53%;
            --primary-foreground: 0 0% 100%;
            --primary-light: 33 100% 63%;
            --primary-dark: 16 85% 45%;

            /* Orange secondary palette */
            --secondary: 33 100% 96%;
            --secondary-foreground: 221 39% 11%;
            --muted: 33 54% 94%;
            --muted-foreground: 221 13% 46%;
            --accent: 33 100% 93%;
            --accent-foreground: 221 39% 11%;

            /* Supporting colors */
            --destructive: 0 84% 60%;
            --destructive-foreground: 0 0% 98%;
            --border: 33 54% 87%;
            --input: 33 54% 87%;
            --ring: 24 95% 53%;
            --radius: 0.75rem;

            /* Orange gradients */
            --gradient-primary: linear-gradient(135deg, hsl(var(--primary)) 0%, hsl(var(--primary-light)) 100%);
            --gradient-hero: linear-gradient(135deg, hsl(var(--primary-dark)) 0%, hsl(var(--primary)) 50%, hsl(var(--primary-light)) 100%);
            --gradient-subtle: linear-gradient(180deg, hsl(var(--background)) 0%, hsl(var(--accent)) 100%);

            /* Professional shadows */
            --shadow-soft: 0 4px 6px -1px hsl(var(--primary) / 0.1), 0 2px 4px -1px hsl(var(--primary) / 0.06);
            --shadow-medium: 0 10px 15px -3px hsl(var(--primary) / 0.1), 0 4px 6px -2px hsl(var(--primary) / 0.05);
            --shadow-large: 0 20px 25px -5px hsl(var(--primary) / 0.1), 0 10px 10px -5px hsl(var(--primary) / 0.04);

            /* Smooth transitions */
            --transition-base: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .dark {
            --background: 222.2 84% 4.9%;
            --foreground: 210 40% 98%;
            --card: 222.2 84% 4.9%;
            --card-foreground: 210 40% 98%;
            --popover: 222.2 84% 4.9%;
            --popover-foreground: 210 40% 98%;
            --primary: 210 40% 98%;
            --primary-foreground: 222.2 47.4% 11.2%;
            --secondary: 217.2 32.6% 17.5%;
            --secondary-foreground: 210 40% 98%;
            --muted: 217.2 32.6% 17.5%;
            --muted-foreground: 215 20.2% 65.1%;
            --accent: 217.2 32.6% 17.5%;
            --accent-foreground: 210 40% 98%;
            --destructive: 0 62.8% 30.6%;
            --destructive-foreground: 210 40% 98%;
            --border: 217.2 32.6% 17.5%;
            --input: 217.2 32.6% 17.5%;
            --ring: 212.7 26.8% 83.9%;
        }

        /* Component styles */
        .hero-gradient {
            background: var(--gradient-hero);
        }

        .card-hover {
            transition: var(--transition-smooth);
            box-shadow: var(--shadow-soft);
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-medium);
        }

        .section-spacing {
            padding: 4rem 0;
        }

        @media (min-width: 768px) {
            .section-spacing {
                padding: 6rem 0;
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        background: 'hsl(var(--background))',
                        foreground: 'hsl(var(--foreground))',
                        card: 'hsl(var(--card))',
                        'card-foreground': 'hsl(var(--card-foreground))',
                        popover: 'hsl(var(--popover))',
                        'popover-foreground': 'hsl(var(--popover-foreground))',
                        primary: 'hsl(var(--primary))',
                        'primary-foreground': 'hsl(var(--primary-foreground))',
                        'primary-light': 'hsl(var(--primary-light))',
                        'primary-dark': 'hsl(var(--primary-dark))',
                        secondary: 'hsl(var(--secondary))',
                        'secondary-foreground': 'hsl(var(--secondary-foreground))',
                        muted: 'hsl(var(--muted))',
                        'muted-foreground': 'hsl(var(--muted-foreground))',
                        accent: 'hsl(var(--accent))',
                        'accent-foreground': 'hsl(var(--accent-foreground))',
                        destructive: 'hsl(var(--destructive))',
                        'destructive-foreground': 'hsl(var(--destructive-foreground))',
                        border: 'hsl(var(--border))',
                        input: 'hsl(var(--input))',
                        ring: 'hsl(var(--ring))',
                    },
                    borderRadius: {
                        lg: 'var(--radius)',
                        md: 'calc(var(--radius) - 2px)',
                        sm: 'calc(var(--radius) - 4px)',
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-background text-foreground antialiased">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-background/95 backdrop-blur-sm border-b border-border z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-bold text-primary">OrganiCorp</div>
                <div class="hidden md:flex space-x-6">
                    <a href="#home" class="text-foreground hover:text-primary transition-colors">Home</a>
                    <a href="#about" class="text-foreground hover:text-primary transition-colors">About</a>
                    <a href="#vision" class="text-foreground hover:text-primary transition-colors">Vision</a>
                    <a href="#team" class="text-foreground hover:text-primary transition-colors">Team</a>
                    <a href="#contact" class="text-foreground hover:text-primary transition-colors">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center justify-center hero-gradient">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-20"
            style="background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2069&q=80')">
        </div>
        <div class="relative z-10 text-center text-white px-4 max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 fade-in">
                Transforming the Future
            </h1>
            <p class="text-xl md:text-2xl mb-8 fade-in opacity-90">
                Leading innovation and excellence in organizational development, creating sustainable solutions for
                tomorrow's challenges.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center fade-in">
                <button
                    class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-secondary text-secondary-foreground hover:bg-secondary/80 h-11 px-8 text-primary hover:text-primary-dark">
                    Learn More
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </button>
                <button
                    class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border bg-background hover:bg-accent hover:text-accent-foreground h-11 px-8 border-white text-white hover:bg-white hover:text-primary">
                    Get Started
                </button>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="section-spacing">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div
                    class="card-hover rounded-lg border bg-gradient-to-br from-accent to-background border-primary/20 text-card-foreground shadow-sm">
                    <div class="flex flex-col space-y-1.5 p-6 text-center">
                        <h3 class="text-4xl font-bold text-primary mb-4">About OrganiCorp</h3>
                        <p class="text-lg text-sm text-muted-foreground">
                            Building tomorrow's organizations today
                        </p>
                    </div>
                    <div class="p-6 pt-0 text-center">
                        <p class="text-lg text-muted-foreground leading-relaxed">
                            OrganiCorp is a pioneering organization dedicated to revolutionizing how businesses operate
                            and grow.
                            With over a decade of experience, we specialize in organizational development, strategic
                            planning,
                            and sustainable growth solutions. Our team of experts works tirelessly to help organizations
                            achieve their full potential while maintaining ethical standards and environmental
                            responsibility.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission, Vision, Goals Section -->
    <section id="vision" class="section-spacing bg-accent/50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-primary mb-4">Our Foundation</h2>
                <p class="text-lg text-muted-foreground">The principles that drive everything we do</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Mission -->
                <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm text-center">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <div class="mx-auto mb-4 p-4 bg-primary/10 rounded-full w-fit">
                            <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <circle cx="12" cy="12" r="6"></circle>
                                <circle cx="12" cy="12" r="2"></circle>
                            </svg>
                        </div>
                        <h3 class="text-2xl text-primary font-semibold leading-none tracking-tight">Mission</h3>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-muted-foreground">
                            To empower organizations with innovative strategies and sustainable solutions that drive
                            meaningful
                            change and create lasting value for all stakeholders.
                        </p>
                    </div>
                </div>

                <!-- Vision -->
                <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm text-center">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <div class="mx-auto mb-4 p-4 bg-primary/10 rounded-full w-fit">
                            <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </div>
                        <h3 class="text-2xl text-primary font-semibold leading-none tracking-tight">Vision</h3>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-muted-foreground">
                            To be the global leader in organizational transformation, fostering a world where businesses
                            thrive while contributing positively to society and the environment.
                        </p>
                    </div>
                </div>

                <!-- Goals -->
                <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm text-center">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <div class="mx-auto mb-4 p-4 bg-primary/10 rounded-full w-fit">
                            <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="7"></circle>
                                <polyline points="8.21,13.89 7,23 12,20 17,23 15.79,13.88"></polyline>
                            </svg>
                        </div>
                        <h3 class="text-2xl text-primary font-semibold leading-none tracking-tight">Goals</h3>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-muted-foreground">
                            To achieve excellence in service delivery, maintain 100% client satisfaction, and expand our
                            positive impact to 1000+ organizations worldwide by 2030.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Objectives Section -->
    <section class="section-spacing">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-primary mb-4">Our Objectives</h2>
                <p class="text-lg text-muted-foreground">Strategic priorities for organizational excellence</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <svg class="h-8 w-8 text-primary mb-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                        <h3 class="text-lg font-semibold leading-none tracking-tight">Innovation Leadership</h3>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-sm text-muted-foreground">
                            Drive cutting-edge solutions and stay ahead of industry trends
                        </p>
                    </div>
                </div>

                <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <svg class="h-8 w-8 text-primary mb-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <h3 class="text-lg font-semibold leading-none tracking-tight">Client Success</h3>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-sm text-muted-foreground">
                            Ensure every client achieves measurable growth and success
                        </p>
                    </div>
                </div>

                <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <svg class="h-8 w-8 text-primary mb-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path
                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                            </path>
                        </svg>
                        <h3 class="text-lg font-semibold leading-none tracking-tight">Global Impact</h3>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-sm text-muted-foreground">
                            Expand our influence to create positive worldwide change
                        </p>
                    </div>
                </div>

                <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <svg class="h-8 w-8 text-primary mb-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="7"></circle>
                            <polyline points="8.21,13.89 7,23 12,20 17,23 15.79,13.88"></polyline>
                        </svg>
                        <h3 class="text-lg font-semibold leading-none tracking-tight">Excellence Standard</h3>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-sm text-muted-foreground">
                            Maintain the highest quality in all our services and deliverables
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Members Section -->
    <section id="team" class="section-spacing bg-accent/50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-primary mb-4">Meet Our Team</h2>
                <p class="text-lg text-muted-foreground">The passionate professionals driving our success</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm text-center">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <div class="mx-auto mb-4">
                            <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&h=256&q=80"
                                alt="CEO - Sarah Johnson"
                                class="w-24 h-24 rounded-full object-cover mx-auto border-4 border-primary/20">
                        </div>
                        <h3 class="text-xl font-semibold leading-none tracking-tight">Sarah Johnson</h3>
                        <p class="text-primary font-semibold text-sm text-muted-foreground">Chief Executive Officer</p>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-sm text-muted-foreground">
                            Visionary leader with 15+ years in organizational development and strategic planning.
                        </p>
                    </div>
                </div>

                <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm text-center">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <div class="mx-auto mb-4">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&h=256&q=80"
                                alt="CTO - Michael Chen"
                                class="w-24 h-24 rounded-full object-cover mx-auto border-4 border-primary/20">
                        </div>
                        <h3 class="text-xl font-semibold leading-none tracking-tight">Michael Chen</h3>
                        <p class="text-primary font-semibold text-sm text-muted-foreground">Chief Technology Officer
                        </p>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-sm text-muted-foreground">
                            Technology innovator focused on digital transformation and process optimization.
                        </p>
                    </div>
                </div>

                <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm text-center">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <div class="mx-auto mb-4">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&h=256&q=80"
                                alt="Marketing Director - Emily Rodriguez"
                                class="w-24 h-24 rounded-full object-cover mx-auto border-4 border-primary/20">
                        </div>
                        <h3 class="text-xl font-semibold leading-none tracking-tight">Emily Rodriguez</h3>
                        <p class="text-primary font-semibold text-sm text-muted-foreground">Marketing Director</p>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-sm text-muted-foreground">
                            Creative strategist specializing in brand development and market expansion.
                        </p>
                    </div>
                </div>

                <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm text-center">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <div class="mx-auto mb-4">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=256&h=256&q=80"
                                alt="Operations Manager - David Thompson"
                                class="w-24 h-24 rounded-full object-cover mx-auto border-4 border-primary/20">
                        </div>
                        <h3 class="text-xl font-semibold leading-none tracking-tight">David Thompson</h3>
                        <p class="text-primary font-semibold text-sm text-muted-foreground">Operations Manager</p>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-sm text-muted-foreground">
                            Operations expert ensuring seamless delivery and exceptional client experiences.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Get in Touch Section -->
    <section id="contact" class="section-spacing">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-primary mb-4">Get in Touch</h2>
                <p class="text-lg text-muted-foreground">Ready to transform your organization? Let's start the
                    conversation.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="text-2xl text-primary font-semibold leading-none tracking-tight">Send Us a Message
                        </h3>
                        <p class="text-sm text-muted-foreground">We'll get back to you within 24 hours</p>
                    </div>
                    <div class="p-6 pt-0 space-y-4">
                        <form>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="text-sm font-medium text-foreground">First Name</label>
                                    <input type="text" placeholder="John"
                                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 mt-1">
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-foreground">Last Name</label>
                                    <input type="text" placeholder="Doe"
                                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 mt-1">
                                </div>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-foreground">Email</label>
                                <input type="email" placeholder="john@example.com"
                                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 mt-1">
                            </div>
                            <div>
                                <label class="text-sm font-medium text-foreground">Company</label>
                                <input type="text" placeholder="Your Company"
                                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 mt-1">
                            </div>
                            <div>
                                <label class="text-sm font-medium text-foreground">Message</label>
                                <textarea placeholder="Tell us about your project..." rows="4"
                                    class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 mt-1 h-32"></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary-dark h-10 px-4 py-2 w-full">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm">
                        <div class="p-6">
                            <div class="flex items-center space-x-4">
                                <div class="p-3 bg-primary/10 rounded-full">
                                    <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                        </path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-foreground">Email Us</h3>
                                    <p class="text-muted-foreground">hello@organicorp.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm">
                        <div class="p-6">
                            <div class="flex items-center space-x-4">
                                <div class="p-3 bg-primary/10 rounded-full">
                                    <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-foreground">Call Us</h3>
                                    <p class="text-muted-foreground">+1 (555) 123-4567</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-hover rounded-lg border bg-card text-card-foreground shadow-sm">
                        <div class="p-6">
                            <div class="flex items-center space-x-4">
                                <div class="p-3 bg-primary/10 rounded-full">
                                    <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-foreground">Visit Us</h3>
                                    <p class="text-muted-foreground">123 Innovation Drive<br>Tech City, TC 12345</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="card-hover bg-gradient-to-br from-primary to-primary-light text-white rounded-lg border shadow-sm">
                        <div class="p-6">
                            <h3 class="font-semibold text-xl mb-2">Ready to Get Started?</h3>
                            <p class="mb-4 opacity-90">
                                Schedule a free consultation to discuss your organization's goals and how we can help
                                achieve them.
                            </p>
                            <button
                                class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-secondary text-secondary-foreground hover:bg-secondary/80 h-10 px-4 py-2 text-primary hover:text-primary-dark">
                                Schedule Consultation
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-card border-t border-border">
        <div class="container mx-auto px-4 py-8">
            <div class="text-center">
                <div class="text-2xl font-bold text-primary mb-4">OrganiCorp</div>
                <p class="text-muted-foreground mb-4">Transforming organizations for a better tomorrow</p>
                <p class="text-sm text-muted-foreground">&copy; 2024 OrganiCorp. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Smooth scrolling script -->
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add fade-in animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>

</html>
