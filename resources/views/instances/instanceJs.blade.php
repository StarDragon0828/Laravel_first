
<!-- alert -->
<script>
  const closeAlert = document.querySelector('#alert-messenger svg');
  const alertContent = document.querySelector('#alert-messenger');
  closeAlert?.addEventListener('click', () => {
      alertContent.style.display = "none";
  });
</script>
<!-- Show Instances -->
<script>
  function generateInstanceHTML(instance) {
    const deleteRoute = `{{ route('delete-instance', ['id' => ':id']) }}`.replace(':id', instance.id);
    const statusColor = instance.status == 0 ? '#ffc107' : '#4abf67';
    const statusText = instance.status == 0 ? 'Aguardando Leitura do QRCode' : 'Conectado';
    const instancePhone = instance.instance_phone ? `+${instance.instance_phone}` : '';
    const buttonHtml = instance.status == 0
        ? `
            <form action="${deleteRoute}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="deleteItem btn btn-danger btn-block" style="max-width: 120px; max-height: 38px;"><i class="fas fa-trash" style="margin-right: 5px;"></i><b>Excluir</b></button>
            </form>
            <button type="button" class="qrItem btn btn-block btn-success" style="max-height: 38px; margin-top: 0; max-width: 120px; min-width: 120px;" ><i class="fas fa-qrcode" style="margin-right: 5px;"></i>QRcode</button>
        `
        : `
            <button class="unplug btn btn-info btn-block" style="max-width: 120px; max-height: 38px;"><i class="fas fa-plug" style="margin-right: 5px;"></i><b>Desativar</b></button>
        `;
    return `
        <div class="card card-primary card-outline" data-instance-id="${instance.id}" data-qr="${instance.qr_code}" data-status="${instance.status}" data-session-name="${instance.session_name}" style="border-top: 0px solid #007bff; min-width: 280px; width: 100%;">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="${instance.instance_profile}" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">${instance.instance_username ? instance.instance_username : instance.session_name}</h3>
                <div style="display: flex; align-items: center; width: 100%; justify-content: center;">
                    <i class="fas fa-dot-circle" style="color: ${statusColor};"></i>
                    <span style="margin-left: 5px;">${statusText}</span>
                </div>
                <p class="text-muted text-center">${instancePhone} / ${instance.session_name}</p>
                <div class="clm-btn" style="display: flex; justify-content: space-around; align-self: center;">
                    ${buttonHtml}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    `;
  }
  function loopInstances(totalInstances) {
    const instancesContainer = document.getElementById('instances-container');
    const noInstance = document.getElementById('no-instance');
    const instances = totalInstances;
    instancesContainer.innerHTML='';
    if(instances.length === 0) {
      noInstance.style.height = '70vh';
      noInstance.innerHTML='<p class="text-center">Nenhuma instância foi criada ainda</p>';
    }
    // Loop through instances and create HTML elements
    instances.forEach(instance => {
      const instanceDiv = generateInstanceHTML(instance);
      instancesContainer.insertAdjacentHTML('beforeend', instanceDiv);
    });
  }
  function displayInstances(browse) {
    // Fetch instances from the server
    if(browse === 'reload') {
      const instances = {!! json_encode($instances) !!}
      loopInstances(instances);
    } else {
      fetch('/get-instances')
        .then(response => response.json())
        .then(data => {
            loopInstances(data.instances);
        })
        .catch(error => {
            console.error('Error fetching instances:', error);
        });
    }
  }
  displayInstances('reload');
</script>
<script>
  const instancesContainer = document.getElementById('instances-container');
  const popupOverlay2 = document.getElementById('popup2');
  const qrContainer = popupOverlay2.querySelector('.QRContainer');
  const qrImage = popupOverlay2.querySelector('.QRContainer .qr-image');
  const qrStatus = popupOverlay2.querySelector('.QRContainer .qr-status');
  const qrLoader = popupOverlay2.querySelector('.QRContainer .container-loader-master');

  // Add click event listener to #popup2
  popupOverlay2.addEventListener('click', (event) => {
      // Check if the clicked element is #popup2 itself, not its children
      if (event.target.id === 'popup2') {
          // Hide the elements
          popupOverlay2.style.display = 'none';
          qrLoader.style.display = 'none';
      }
  });
  // Use event delegation to handle clicks on QR code elements
  instancesContainer.addEventListener('click', async function (event) {
      const target = event.target;

      if (target.classList.contains('qrItem') || target.parentNode.classList.contains('qrItem')) {
        event.stopPropagation();
        event.preventDefault();
        const instanceId = target.closest('.card').getAttribute('data-instance-id');
        const instanceQR = target.closest('.card').getAttribute('data-qr');
        const instanceStatus = target.closest('.card').getAttribute('data-status');
        // Handle the QR code click event here
        popupOverlay2.style.display = 'flex';
        qrLoader.style.display = 'flex';
      }
      if (target.classList.contains('unplug') || target.parentNode.classList.contains('unplug')) {
        event.stopPropagation();
        event.preventDefault();
        const instanceId = target.closest('.card').getAttribute('data-instance-id');
        Swal.fire({
            title: "Você quer desconectar?",
            icon: "warning",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si acepto!',
            showCancelButton: true,
            showLoaderOnConfirm: true, // Display loader until the request is complete
            preConfirm: async () => {
                try {
                  console.log('Unplug success');
                } catch (error) {
                    Swal.showValidationMessage(`Error: ${error.message}`);
                    return false; // Keep the modal open
                }
            }
        }).then((result) => {
            if (result.value) {
                displayInstances('noLoad');
            }
        });
      }
      // Check if the clicked element has the class "deleteItem"
      if (target.classList.contains('deleteItem') || target.parentNode.classList.contains('deleteItem')) {
          event.stopPropagation();
          event.preventDefault();
    
          // Find the closest form element
          var form = target.closest("form");
          var name = target.dataset.name;
    
          Swal.fire({
              title: "Estas seguro de eliminar este documento?",
              text: "Si lo elimina, será permanente.",
              icon: "warning",
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si acepto!',
              showCancelButton: true
          }).then(function(result) {
              if (result.isConfirmed) {
                  form.submit();
              }
          });
      }
  });
</script>
<script>
  // Obtener elementos
  const openPopupBtn3 = document.getElementById('addInstance');
  const popupOverlay3 = document.getElementById('popup');
  const salvInstance = document.getElementById('salvInstance');
  const cancelInstance = document.getElementById('cancelInstance');
  // Abrir el popup
  openPopupBtn3.addEventListener('click', () => {
    popupOverlay3.style.display = 'flex';
    console.log("funca")
  });

  // Cerrar el popup
  cancelInstance.addEventListener('click', () => {
    popupOverlay3.style.display = 'none';
    console.log("funca")
  });
  salvInstance.addEventListener('click', () => {
    popupOverlay3.style.display = 'none';
    console.log("funca")
  });
</script>
<script>
  // Obtener elementos
  const openPopupBtn = document.getElementById('openPopupBtn3');
  const popupOverlay = document.getElementById('popupOverlay-2');
  const closePopupBtn = document.getElementById('closePopupBtn2');
  const closePopupBtncan = document.getElementById('closePopupBtncan');
  
  // Abrir el popup
  openPopupBtn.addEventListener('click', () => {
    popupOverlay.style.display = 'flex';
    console.log("funca")
  });

  // Cerrar el popup
  closePopupBtn.addEventListener('click', () => {
    popupOverlay.style.display = 'none';
    console.log("funca")
  });
  closePopupBtncan.addEventListener('click', () => {
    popupOverlay.style.display = 'none';
    console.log("funca")
  });
</script>
<!-- WebSocket -->
<!-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
  var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
    cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
  });

  const qrObject = {
    status: '',
    session: '',
    imageUrl: ''
  };

  var channel = pusher.subscribe('QR-channel');
  channel.bind('QR', async function(data) {
    const response = await data.message;
    
    // Update the qrObject properties
    if (response.status) {
      qrObject.status = response.status;
    }
    if (response.session) {
      qrObject.session = response.session;
    }
    if (response.imageUrl) {
      qrObject.imageUrl = response.imageUrl;
    }

    // Update the HTML container based on the qrObject properties
    qrStatus.innerHTML = '';
    if (qrObject.status) {
      qrStatus.insertAdjacentHTML('beforeend', `<p style="text-align: center">Status - ${qrObject.status}</p>`);
    }
    if (qrObject.session) {
      qrStatus.insertAdjacentHTML('beforeend', `<p style="text-align: center">Session - ${qrObject.session}</p>`);
    }
    if (qrObject.imageUrl) {
      qrImage.innerHTML = `<img width="100%" src="${qrObject.imageUrl}" alt="QR Code" />`;
    }
    if (qrObject.status === 'successChat') {
      popupOverlay2.style.display = 'none';
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      });
      swalWithBootstrapButtons.fire(
        'Conectado!',
        'Conectado com sucesso.',
        'success'
      ).then(result => {
        if(result.isConfirmed) {
          displayInstances('noLoad');
        }
      });
    }
  });
</script> -->