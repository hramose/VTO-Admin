@extends('back.template')

@section('main')

	@include('back.partials.entete', ['title' => trans('back/admin.dashboard'), 'icone' => 'dashboard', 'fil' => trans('back/admin.dashboard')])

	<div class="row">





		@include('back/partials/pannel', ['color' => 'bg-green', 'icone' => 'fa fa-envelope icon-success', 'nbr' => $nbrMessages, 'name' => trans('back/admin.messages'), 'url' => 'contact', 'total' => trans('back/admin.messages')])

		@include('back/partials/pannel', ['color' => 'bg-yellow', 'icone' => 'ion ion-person-add icon-success', 'nbr' => $nbrUsers, 'name' => trans('back/admin.users'), 'url' => 'user', 'total' => trans('back/admin.users')])

		@include('back/partials/pannel', ['color' => 'bg-aqua', 'icone' => 'fa fa-pencil icon-success', 'nbr' => $nbrPosts, 'name' => trans('back/admin.posts'), 'url' => 'blog', 'total' => trans('back/admin.posts')])

		@include('back/partials/pannel', ['color' => 'bg-red', 'icone' => 'fa fa-fw fa-comments icon-success', 'nbr' => $nbrComments, 'name' => trans('back/admin.comments'), 'url' => 'comment', 'total' => trans('back/admin.comments')])



@stop

