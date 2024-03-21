@extends('template.layout')

@section('content')
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title" data-aos="zoom-out">
                        <h2>About Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset('img/') }}" class="img" alt="About Us" data-aos="zoom-out" data-aos-delay="100">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
                    <h3>Who We Are</h3>
                    <p>
                        We are a team of passionate developers dedicated to crafting amazing web applications.
                        Our mission is to provide innovative solutions that empower businesses and individuals
                        to thrive in the digital world.
                    </p>
                    <h3>What We Do</h3>
                    <p>
                        We specialize in developing custom web applications tailored to our clients' unique needs.
                        Whether you need a simple website or a complex e-commerce platform, we've got you covered.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
