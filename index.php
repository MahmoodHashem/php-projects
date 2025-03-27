<?php
// Project configuration
$config = [
    'site_name' => 'PHP University Projects',
    'author' => 'Mahmood Hashemi',
    'github' => 'https://github.com/MahmoodHashem/php-projects',
    'university' => 'Herat University',
    'course' => 'Advanced Web Development with PHP',
    'semester' => 'Spring 2025',
    'instructor' => 'Prof. Olumi'
];

// Projects list
$projects = [
    [
        'id' => 'portfolio-site',
        'name' => 'Portfolio Site',
        'description' => 'Professional portfolio website with admin panel',
        'features' => ['Project showcase', 'Contact form', 'Admin dashboard'],
        'status' => 'completed', // completed, in-progress, planned
        'image' => 'pc-pool.jpg',
        'due_date' => 'February 15, 2025',
        'technologies' => ['PHP', 'MySQL', 'Tailwind CSS', 'JavaScript']
    ],
    // [
    //     'id' => 'blog-system',
    //     'name' => 'Blog System',
    //     'description' => 'Full-featured blog with posts and comments',
    //     'features' => ['Categories', 'Tags', 'User comments', 'Admin management'],
    //     'status' => 'in-progress',
    //     'image' => 'blog.jpg',
    //     'due_date' => 'March 10, 2025',
    //     'technologies' => ['PHP', 'MySQL', 'Tailwind CSS', 'AJAX']
    // ],
    // [
    //     'id' => 'e-commerce',
    //     'name' => 'E-commerce Store',
    //     'description' => 'Online shop with product catalog and checkout',
    //     'features' => ['Product listings', 'Shopping cart', 'Checkout process'],
    //     'status' => 'planned',
    //     'image' => 'ecommerce.jpg',
    //     'due_date' => 'April 5, 2025',
    //     'technologies' => ['PHP', 'MySQL', 'Tailwind CSS', 'JavaScript', 'Payment API']
    // ],
    // [
    //     'id' => 'task-manager',
    //     'name' => 'Task Manager',
    //     'description' => 'To-do list application with user accounts',
    //     'features' => ['Task creation', 'Categories', 'Due dates', 'Notifications'],
    //     'status' => 'in-progress',
    //     'image' => 'tasks.jpg',
    //     'due_date' => 'March 25, 2025',
    //     'technologies' => ['PHP', 'MySQL', 'Tailwind CSS', 'JavaScript']
    // ],
    // [
    //     'id' => 'user-authentication',
    //     'name' => 'User Authentication',
    //     'description' => 'Secure login and registration system',
    //     'features' => ['Registration', 'Login', 'Password reset', 'Profile management'],
    //     'status' => 'completed',
    //     'image' => 'auth.jpg',
    //     'due_date' => 'February 1, 2025',
    //     'technologies' => ['PHP', 'MySQL', 'Tailwind CSS', 'Security Practices']
    // ],
    // [
    //     'id' => 'file-manager',
    //     'name' => 'File Manager',
    //     'description' => 'File upload and management system',
    //     'features' => ['File upload', 'Organization', 'Sharing', 'Permissions'],
    //     'status' => 'planned',
    //     'image' => 'files.jpg',
    //     'due_date' => 'April 20, 2025',
    //     'technologies' => ['PHP', 'MySQL', 'Tailwind CSS', 'JavaScript', 'File System API']
    // ]
];

// Helper function to get status badge class
function getStatusBadgeClass($status) {
    switch ($status) {
        case 'completed':
            return 'bg-green-100 text-green-800';
        case 'in-progress':
            return 'bg-blue-100 text-blue-800';
        case 'planned':
            return 'bg-purple-100 text-purple-800';
        default:
            return 'bg-gray-100 text-gray-700';
    }
}

// Helper function to get placeholder image if actual image doesn't exist
function getProjectImage($image) {
    // In a real scenario, you would check if the file exists
    // For now, we'll return a placeholder URL that uses the project's image name
    return "./assets/images/{$image}";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['site_name']; ?> | <?php echo $config['university']; ?></title>
    <link rel="stylesheet" href="output.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .project-card:hover .project-image img {
            transform: scale(1.05);
        }
        .project-image img {
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900"><?php echo $config['site_name']; ?></h1>
                    <p class="text-gray-600">
                        <?php echo $config['course']; ?> • <?php echo $config['semester']; ?>
                    </p>
                </div>
                <div class="mt-4 md:mt-0 flex space-x-1">
                    <a href="#projects" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#0088cc]">Projects</a>
                    <a href="#about" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#0088cc]">About</a>
                    <a href="<?php echo $config['github']; ?>" target="_blank" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#0088cc] hover:bg-blue-800">
                        GitHub Repository
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-[#0088cc] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="md:flex md:items-center md:justify-between">
                <div class="md:w-1/2 mb-6 md:mb-0">
                    <span class="inline-block px-3 py-1 bg-blue-800 text-white text-xs font-semibold rounded-full mb-2">
                        <?php echo $config['university']; ?>
                    </span>
                    <h2 class="text-3xl font-bold mb-4">PHP Development Portfolio</h2>
                    <p class="text-lg mb-6">
                        A collection of web applications developed during the <?php echo $config['course']; ?> course in <?php echo $config['semester']; ?>.
                    </p>
                    <div class="flex space-x-1">
                        <a href="#projects" class="px-4 py-2 bg-white text-[#0088cc] rounded-md font-medium">View Projects</a>
                        <a href="#about" class="px-4 py-2 bg-blue-800 text-white rounded-md font-medium">Course Details</a>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center">
                    <img class="rounded-2xl max-w-sm" src="./assets/images/pc-pool.jpg" alt="pc pool">
                </div>
            </div>
        </div>
    </section>

    <!-- Course Information -->
    <section class="py-8 bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-4">
                    <h3 class="text-sm font-semibold text-gray-600 uppercase mb-1">Course</h3>
                    <p class="text-lg font-medium text-gray-900"><?php echo $config['course']; ?></p>
                </div>
                <div class="p-4">
                    <h3 class="text-sm font-semibold text-gray-600 uppercase mb-1">Semester</h3>
                    <p class="text-lg font-medium text-gray-900"><?php echo $config['semester']; ?></p>
                </div>
                <div class="p-4">
                    <h3 class="text-sm font-semibold text-gray-600 uppercase mb-1">Instructor</h3>
                    <p class="text-lg font-medium text-gray-900"><?php echo $config['instructor']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Course Projects</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    A series of PHP applications developed throughout the semester, showcasing various web development skills and techniques.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($projects as $project): ?>
                <div class="bg-white rounded-lg shadow overflow-hidden project-card hover:shadow-md transition">
                    <!-- Project Image -->
                    <div class="h-48 overflow-hidden project-image">
                        <img src="<?php echo getProjectImage($project['image']); ?>" 
                             alt="<?php echo $project['name']; ?>" 
                             class="w-full h-full object-cover">
                    </div>
                    
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-semibold text-gray-900"><?php echo $project['name']; ?></h3>
                            <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full <?php echo getStatusBadgeClass($project['status']); ?>">
                                <?php echo ucfirst($project['status']); ?>
                            </span>
                        </div>
                        
                        <p class="text-gray-600 mb-4"><?php echo $project['description']; ?></p>
                        
                        <div class="mb-4">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Key Features:</h4>
                            <ul class="text-sm text-gray-600">
                                <?php foreach ($project['features'] as $feature): ?>
                                <li class="flex items-center mb-1">
                                    <span class="mr-2">•</span>
                                    <?php echo $feature; ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Due: <?php echo $project['due_date']; ?>
                        </div>
                        
                        <div class="mb-4">
                            <div class="flex flex-wrap gap-1">
                                <?php foreach ($project['technologies'] as $tech): ?>
                                <span class="inline-flex px-2 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-md">
                                    <?php echo $tech; ?>
                                </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <a href="<?php echo $project['id']; ?>/" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#0088cc] hover:bg-blue-800">
                                View Project
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


  

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p>© 2023 My Portfolio. All rights reserved.</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-gray-300">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:text-gray-300">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>