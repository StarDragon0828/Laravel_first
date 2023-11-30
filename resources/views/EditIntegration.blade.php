@extends('layouts.app')

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- ./wrapper -->
    <div id="customUpdateContainer" class="custom-popup-container p-5">
        <div id="customUpdate" class=" custom-popup-content">
        <form method="POST" action="{{ route('Integracao.update', $integration->id) }}">
            @csrf
            @method('PUT')
            <div class="padding-container">
                <input type="hidden" name="integration_id" id="integrationId">
                <div class="crustom-modal-popup">
                <div id="closeCustomUpdateButton" class="custom-close-button">
                    <label for="exampleInputEmail1">Adicionar integração</label>
                </div>
                <div class="form-group">
                    <label for="nombreIntegracaoUpdate">Nome</label>
                    <input type="text" name="name" class="form-control" id="nombreIntegracaoUpdate" placeholder="Enter nome">
                </div>
                <div class="form-group">
                    <label>Plataformas</label>
                    <select name="platform" class="form-control select2 select2-hidden-accessible" style="width: 100%;">
                    <option value="Abmex" selected>Abmex</option>
                    <option value="ActiveCampaign">ActiveCampaign</option>
                    <option value="BaseCamp">BaseCamp</option>
                    <option value="Braip">Braip</option>
                    <option value="ClickUp">ClickUp</option>
                    <option value="ContactFrom7">Contact From 7</option>
                    <option value="DigitalManagerGuru">Digital Manager Guru</option>
                    <option value="E-goi">E-goi</option>
                    <option value="Eduzz">Eduzz</option>
                    <option value="FluentForms">Fluent Forms</option>
                    <option value="Greenn">Greenn</option>
                    <option value="GTM">Google Tag Manager (GTM)</option>
                    <option value="WooCommerce">WooCommerce</option>
                    </select>
                </div>
                <div style="margin-top: 20px;">
                    <span>Instâncias vinculadas</span>
                    @foreach ($instances as $instance)
                    <div class="custom-control custom-checkbox">
                    <input name="instances[]" id="customCheckboxUpdate{{$instance->id}}" class="custom-control-input" type="checkbox" value="{{$instance->id}}">
                    <label for="customCheckboxUpdate{{$instance->id}}" class="custom-control-label">{{$instance->session_name}}</label>
                    </div>
                    @endforeach
                    <div style="margin-top: 20px;">
                    <span>Opções avançadas</span>
                    <div class="custom-control custom-checkbox">
                        <input id="customCheckboxDuplicate" name="ignore_duplicates" class="custom-control-input" type="checkbox" value="1">
                        <label for="customCheckboxDuplicate" class="custom-control-label">Ignorar Eventos Duplicados</label>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{URL::previous()}}"><button type="button" id="cancelUpdateButton" class="btn btn-default float-right">Cancel</button></a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
        </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const integrationData = @json($integration); // Pass the integration data from the controller to the view

        // Pre-fill form fields with integration data
        document.getElementById('nombreIntegracaoUpdate').value = integrationData.name;
        document.querySelector(`select[name="platform"] option[value="${integrationData.platform}"]`).selected = true;
        console.log(integrationData);
        const instancesArray = integrationData.instances.split(',');
        instancesArray.forEach(instanceId => {
            console.log(instanceId);
            document.getElementById(`customCheckboxUpdate${instanceId}`).checked = true;
        });
        // Set the default value for "Ignore Duplicates" checkbox
        const ignoreDuplicatesCheckbox = document.querySelector('input[name="ignore_duplicates"]');
        ignoreDuplicatesCheckbox.checked = integrationData.ignore_duplicates == 1;
    });
  </script>
@endsection