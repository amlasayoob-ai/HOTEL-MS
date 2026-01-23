<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grand Stay Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- NAVBAR -->
<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-indigo-600">GrandKandyan</h1>
        <ul class="hidden md:flex space-x-8 font-medium">
            <li><a href="#" class="hover:text-indigo-600">Home</a></li>
            <li><a href="#rooms" class="hover:text-indigo-600">Rooms</a></li>
            <li><a href="#services" class="hover:text-indigo-600">Services</a></li>
            <li><a href="#about" class="hover:text-indigo-600">About</a></li>
            <li><a href="#contact" class="hover:text-indigo-600">Contact</a></li> 
        </ul>
        <div class="space-x-3">
            <a href="login" class="px-4 py-2 border border-indigo-600 text-indigo-600 rounded hover:bg-indigo-600 hover:text-white">Login</a>
        </div>
    </div>
</nav>

<!-- HERO SECTION -->
<section class="relative bg-cover bg-center h-[80vh]" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative flex items-center justify-center h-full text-center text-white px-4">
        <div>
            <h2 class="text-4xl md:text-5xl font-bold mb-4">Luxury Stay, Best Comfort</h2>
            <p class="mb-6 text-lg">Experience world-class hospitality with us</p>
            <a href="#" class="bg-indigo-600 px-6 py-3 rounded text-lg hover:bg-indigo-700">Check Availability</a>
        </div>
    </div>
</section>

<!-- SERVICES -->
<section id="services" class="py-16">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h3 class="text-3xl font-bold mb-12">Our Services</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-lg shadow hover:shadow-lg">
                <h4 class="text-xl font-semibold mb-3">24/7 Reception</h4>
                <p>Always available to assist you anytime.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow hover:shadow-lg">
                <h4 class="text-xl font-semibold mb-3">Free Wi-Fi</h4>
                <p>High speed internet throughout the hotel.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow hover:shadow-lg">
                <h4 class="text-xl font-semibold mb-3">Restaurant</h4>
                <p>Delicious food with multi-cuisine options.</p>
            </div>
        </div>
    </div>
</section>

<!-- ROOMS -->
<section id="rooms" class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-12">Our Rooms</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32" class="h-48 w-full object-cover">
                <div class="p-6">
                    <h4 class="font-semibold text-xl mb-2">Standard Room</h4>
                    <p class="mb-3">Comfortable & affordable stay.</p>
                    <p class="font-bold text-indigo-600">$80 / Night</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <img src="https://images.unsplash.com/photo-1595576508898-0ad5c879a061" class="h-48 w-full object-cover">
                <div class="p-6">
                    <h4 class="font-semibold text-xl mb-2">Deluxe Room</h4>
                    <p class="mb-3">More space with premium comfort.</p>
                    <p class="font-bold text-indigo-600">$120 / Night</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" class="h-48 w-full object-cover">
                <div class="p-6">
                    <h4 class="font-semibold text-xl mb-2">Suite</h4>
                    <p class="mb-3">Luxury stay with best facilities.</p>
                    <p class="font-bold text-indigo-600">$200 / Night</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section id="about" class="py-16">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <h3 class="text-3xl font-bold mb-6">About Us</h3>
        <p class="text-lg leading-relaxed">
            GrandStay Hotel offers modern rooms, excellent service, and a peaceful environment.
            Our hotel management system ensures smooth booking, secure payments, and quality service.
        </p>
    </div>
</section>

<!-- FOOTER -->
<footer id="contact" class="bg-gray-900 text-gray-300 py-10">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
            <h4 class="text-xl font-bold text-white mb-3">GrandStay</h4>
            <p>Your comfort is our priority.</p>
        </div>
        <div>
            <h4 class="text-xl font-bold text-white mb-3">Quick Links</h4>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-white">Home</a></li>
                <li><a href="#" class="hover:text-white">Rooms</a></li>
                <li><a href="#" class="hover:text-white">Services</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-xl font-bold text-white mb-3">Contact</h4>
            <p>Email: info@grandstay.com</p>
            <p>Phone: +94 77 123 4567</p>
        </div>
    </div>
    <p class="text-center text-sm mt-8">&copy; 2026 GrandStay Hotel. All rights reserved.</p>
</footer>

</body>
</html>
