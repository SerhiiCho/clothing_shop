@extends('layouts.app')

@section('content')

<div class="single-container">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-lg-3 single-image">
			<img src="{{ asset('storage/img/clothes/2.jpg') }}" alt="Платья">
		</div>
		<div class="col-xs-12 col-sm-8 col-lg-9 single-info">
			<div class="row">

				<!-- Title -->
				<div class="col-xs-6">
					<span class="single-title">Название вещи</span>
				</div>

				<!-- Price -->
				<div class="col-xs-6">
					<p class="single-price">399<span>грн</span></p>
				</div>

				<!-- ID and Category -->
				<div class="col-xs-12">
					<span class="single-status">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i> 
						Номер товара: 424
					</span>
					<span class="single-status" style="display: flex;">
						Категория: &nbsp; Женская одежда
					</span>
				</div>

				<!-- Intro -->
				<div class="col-xs-12 single-intro">
					<p><!-- Intro here--></p>
				</div>
			</div>
		</div>

		<!-- Sidebar -->
		<div class="col-xs-12 sidebar">
			<section class="heading">@lang('messages.more_clothes')</section>
			<div class="row">
				<div class="col-lg-2 col-md-3 col-xs-6 col-sm-4 card">
					<a href="#" title="#">
						<img src="{{ asset('storage/img/clothes/1.jpg') }}" alt="Платья">
					</a>
					<div class="card-price">
						<span>Title</span>
						<span>50 грн</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection