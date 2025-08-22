@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edition de l'unité</small></h5>

                    </div>
                    <div class="ibox-content">
                        <form method="POST" class="form-horizontal" action="{{ route('users.update',$user->id) }}" >
                            @csrf
                            @method('PUT')
                            <x-text-input label="Nom" name="nom" status="success" required="true" value="{{ $user->nom }}"/>
                            <x-text-input label="Prénom" name="prenom" status="success" required="true" value="{{ $user->prenom }}"/>
                            <x-text-input label="Email" name="email" status="success" required="true" type="email" value="{{ $user->email }}"/>
                            <x-text-input label="Username" name="username" status="success" required="true" value="{{ $user->username }}"/>
                            <x-text-input label="Contact" name="contact" status="success" required="true" value="{{ $user->contact }}"/>
                            <x-input-select label="Rôle" id="role" name="role" :options="$roles" :displayField="['name']" :selected="$user->role_id" />
                            <x-text-input label="Mot de pass" name="password" status="success"  type="password"/>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <x-primary-button type="submit" class="demo1">
                                        Enrégistrer
                                    </x-primary-button>
                                    <x-secondary-button type="reset">
                                        Effacer
                                    </x-secondary-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@php
    $title = 'Unités';
    $breadcrumb = [
        ['name' => 'App Views', 'url' => '#'],
        ['name' => 'Editer unité', 'url' => '']
    ];
@endphp
