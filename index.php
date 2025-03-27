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

// Projects list categorized by difficulty
$projectCategories = [
    'basic' => [
        'title' => 'Basic Projects',
        'description' => 'Foundational PHP applications focusing on core concepts and simple functionality.',
        'projects' => [
            [
                'id' => 'portfolio-site',
                'name' => 'Portfolio Site',
                'description' => 'Professional portfolio website with admin panel',
                'features' => ['Project showcase', 'Contact form', 'Admin dashboard'],
                'status' => 'completed',
                'image' => 'portfolio.jpg',
                'due_date' => 'February 15, 2025',
                'technologies' => ['PHP', 'MySQL', 'Tailwind CSS', 'JavaScript']
            ],
            [
                'id' => 'user-authentication',
                'name' => 'User Authentication',
                'description' => 'Secure login and registration system',
                'features' => ['Registration', 'Login', 'Password reset', 'Profile management'],
                'status' => 'completed',
                'image' => 'auth.jpg',
                'due_date' => 'February 1, 2025',
                'technologies' => ['PHP', 'MySQL', 'Tailwind CSS', 'Security Practices']
            ]
        ]
    ],
    'intermediate' => [
        'title' => 'Intermediate Projects',
        'description' => 'More complex applications with advanced functionality and database interactions.',
        'projects' => [
            [
                'id' => 'blog-system',
                'name' => 'Blog System',
                'description' => 'Full-featured blog with posts and comments',
                'features' => ['Categories', 'Tags', 'User comments', 'Admin management'],
                'status' => 'in-progress',
                'image' => 'blog.jpg',
                'due_date' => 'March 10, 2025',
                'technologies' => ['PHP', 'MySQL', 'Tailwind CSS', 'AJAX']
            ],
            [
                'id' => 'task-manager',
                'name' => 'Task Manager',
                'description' => 'To-do list application with user accounts',
                'features' => ['Task creation', 'Categories', 'Due dates', 'Notifications'],
                'status' => 'in-progress',
                'image' => 'tasks.jpg',
                'due_date' => 'March 25, 2025',
                'technologies' => ['PHP', 'MySQL', 'Tailwind CSS', 'JavaScript']
            ]
        ]
    ],
    'advanced' => [
        'title' => 'Advanced Projects',
        'description' => 'Sophisticated applications demonstrating mastery of PHP and related technologies.',
        'projects' => [
            [
                'id' => 'e-commerce',
                'name' => 'E-commerce Store',
                'description' => 'Online shop with product catalog and checkout',
                'features' => ['Product listings', 'Shopping cart', 'Checkout process', 'Payment integration'],
                'status' => 'planned',
                'image' => 'ecommerce.jpg',
                'due_date' => 'April 5, 2025',
                'technologies' => ['PHP', 'MySQL', 'Tailwind CSS', 'JavaScript', 'Payment API']
            ],
            [
                'id' => 'file-manager',
                'name' => 'File Manager',
                'description' => 'File upload and management system',
                'features' => ['File upload', 'Organization', 'Sharing', 'Permissions'],
                'status' => 'planned',
                'image' => 'files.jpg',
                'due_date' => 'April 20, 2025',
                'technologies' => ['PHP', 'MySQL', 'Tailwind CSS', 'JavaScript', 'File System API']
            ]
        ]
    ]
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

// Helper function to get category badge class
function getCategoryBadgeClass($category) {
    switch ($category) {
        case 'basic':
            return 'bg-green-100 text-green-800 border-green-200';
        case 'intermediate':
            return 'bg-blue-100 text-blue-800 border-blue-200';
        case 'advanced':
            return 'bg-purple-100 text-purple-800 border-purple-200';
        default:
            return 'bg-gray-100 text-gray-700 border-gray-200';
    }
}

// Helper function to get placeholder image if actual image doesn't exist
function getProjectImage($image) {
    // In a real scenario, you would check if the file exists
    // For now, we'll return a placeholder URL that uses the project's image name
    return '';
}

function getPlaceholder() {
       return 'https://www.interviewbit.com/blog/wp-content/uploads/2021/12/PHP-Projects.png'; 
   
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
        .category-section {
            scroll-margin-top: 2rem;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900"><?php echo $config['site_name']; ?></h1>
                    <p class="text-sm text-gray-600">
                        <?php echo $config['course']; ?> • <?php echo $config['semester']; ?>
                    </p>
                </div>
                <div class="mt-4 md:mt-0 flex flex-wrap gap-2">
                    <a href="#basic" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#0088cc]">Basic</a>
                    <a href="#intermediate" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#0088cc]">Intermediate</a>
                    <a href="#advanced" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#0088cc]">Advanced</a>
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
                    <div class="flex flex-wrap gap-2">
                        <a href="#basic" class="px-4 py-2 bg-white text-[#0088cc] rounded-md font-medium">Basic Projects</a>
                        <a href="#intermediate" class="px-4 py-2 bg-blue-800 text-white rounded-md font-medium">Intermediate Projects</a>
                        <a href="#advanced" class="px-4 py-2 bg-blue-800 text-white rounded-md font-medium">Advanced Projects</a>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center">
                    <!-- Hero illustration or image -->
                    <img src="https://media.geeksforgeeks.org/wp-content/cdn-uploads/20220407112705/Top-10-PHP-Projects-Ideas-For-Beginners.png" alt="PHP Projects" class="rounded-lg shadow-lg max-w-full h-auto" style="max-height: 300px;">
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

    <!-- Projects Overview -->
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Course Projects</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    A series of PHP applications developed throughout the semester, categorized by complexity level.
                </p>
            </div>
            
            <!-- Project Categories Navigation -->
            <div class="flex justify-center mb-8">
                <div class="inline-flex rounded-md shadow-sm" role="group">
                    <a href="#basic" class="px-4 py-2 text-sm font-medium bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-[#0088cc] focus:z-10 focus:text-[#0088cc]">
                        Basic
                    </a>
                    <a href="#intermediate" class="px-4 py-2 text-sm font-medium bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-[#0088cc] focus:z-10 focus:text-[#0088cc]">
                        Intermediate
                    </a>
                    <a href="#advanced" class="px-4 py-2 text-sm font-medium bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 hover:text-[#0088cc] focus:z-10 focus:text-[#0088cc]">
                        Advanced
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Categories -->
    <?php foreach ($projectCategories as $categoryKey => $category): ?>
    <section id="<?php echo $categoryKey; ?>" class="py-8 category-section <?php echo $categoryKey !== 'basic' ? 'mt-6' : ''; ?>">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Category Header -->
            <div class="mb-8 border-l-4 pl-4 <?php echo str_replace('bg-', 'border-', getCategoryBadgeClass($categoryKey)); ?>">
                <h2 class="text-2xl font-bold text-gray-900"><?php echo $category['title']; ?></h2>
                <p class="text-gray-600"><?php echo $category['description']; ?></p>
            </div>
            
            <!-- Category Badge -->
            <div class="mb-6">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium border <?php echo getCategoryBadgeClass($categoryKey); ?>">
                    <?php echo count($category['projects']); ?> Projects
                </span>
            </div>
            
            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($category['projects'] as $project): ?>
                    <div class="bg-white rounded-lg shadow overflow-hidden project-card hover:shadow-md transition">
                    <!-- Project Image -->
                    <div class="h-48 overflow-hidden project-image">
                        <img src="<?php echo getPlaceholder(); ?>" 
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

    <?php endforeach; ?>