@extends('layouts.app')

<!-- @section('content') -->
<div class="container">
    <!-- Header Section -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">{{ __('Qais Construction') }}</h2>
                </div>
                <div class="card-body text-center">
                    <h1>Welcome to our website!</h1>
                    <p>We provide the best construction services in the region.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h2 class="text-center">{{ __('Our Services') }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="service-box">
                                <i class="fas fa-home fa-3x mb-3"></i>
                                <h4>{{ __('Home Construction') }}</h4>
                                <p>We offer modern home construction services using the best materials.</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="service-box">
                                <i class="fas fa-building fa-3x mb-3"></i>
                                <h4>{{ __('Commercial Buildings') }}</h4>
                                <p>We specialize in constructing high-standard commercial buildings.</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="service-box">
                                <i class="fas fa-wrench fa-3x mb-3"></i>
                                <h4>{{ __('Maintenance & Repair') }}</h4>
                                <p>We provide maintenance and repair services for all types of buildings.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Projects Section -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h2 class="text-center">{{ __('Recent Projects') }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="project-box">
                                <img src="path/to/project1.jpg" class="img-fluid mb-3" alt="Project 1">
                                <h4>{{ __('Project 1') }}</h4>
                                <p>Brief description of project 1.</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="project-box">
                                <img src="path/to/project2.jpg" class="img-fluid mb-3" alt="Project 2">
                                <h4>{{ __('Project 2') }}</h4>
                                <p>Brief description of project 2.</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="project-box">
                                <img src="path/to/project3.jpg" class="img-fluid mb-3" alt="Project 3">
                                <h4>{{ __('Project 3') }}</h4>
                                <p>Brief description of project 3.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Us Section -->
    <div class="row justify-content-center mt-4 mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h2 class="text-center">{{ __('Contact Us') }}</h2>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="message">{{ __('Message') }}</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Enter your message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
