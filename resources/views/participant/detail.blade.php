@extends('master')

@section('title', 'Katılımcı Detayları')
    
@section('content')
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($user->image == null)
                                <a href="javascript:;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#UploadModal"><i class="fas fa-camera"></i> Fotoğraf Yükle</a>
                            @endif
                            <img src="{{$user->image}}" alt="" width="100%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <ul class="list-group">
                
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">İsim:</span>
                            <span>{{$user->name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">E-posta:</span>
                            <span>{{$user->email}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Telefon:</span>
                            <span>{{$user->phone}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Konum:</span>
                            <span>{{$user->district.'/'.$user->city.'/'.$user->country}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Adres:</span>
                            <span>{{$user->address}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Cinsiyet:</span>
                            <span>
                            @if ($user->gender == 1)
                                Erkek
                            @elseif($user->gender == 2)
                                Kadın
                            @else
                                -
                            @endif
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Doğum Tarihi:</span>
                            <span>{{$user->birthdate}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Kan Grubu:</span>
                            <span>
                                @if ($user->blood_group == 1)
                                    A RH +
                                @elseif($user->blood_group == 2)
                                    A RH -
                                @elseif($user->blood_group == 3)
                                    B RH +
                                @elseif($user->blood_group == 4)
                                    B RH -
                                @elseif($user->blood_group == 5)
                                    AB RH +
                                @elseif($user->blood_group == 6)
                                    AB RH -
                                @elseif($user->blood_group == 7)
                                    0 RH +
                                @elseif($user->blood_group == 8)
                                    0 RH -
                                @else
                                    -
                                @endif
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Boy/Kilo:</span>
                            <span>{{$user->height.'cm / '.$user->weight.'kg'}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Durum:</span>
                            <span>{{$user->status == 1 ? 'Aktif' : 'Pasif'}}</span>
                        </li>
                      </ul>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <div class="list-group">
                        <a href="/participant/edit/{{$user->id}}" class="list-group-item list-group-item-action " aria-current="true">
                          Düzenle
                        </a>
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#UploadModal" class="list-group-item list-group-item-action" aria-current="true">
                            Fotoğraf Değiştir
                        </a>
                        
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#emergencyContactModal" class="list-group-item list-group-item-action" aria-current="true">
                            Acil Durum Kişisi Ekle
                        </a>
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#diseaseModal" class="list-group-item list-group-item-action" aria-current="true">
                            Hastalık Ekle
                        </a>
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#alergyModal" class="list-group-item list-group-item-action" aria-current="true">
                            Alerji Ekle
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            İlaç Ekle
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            Belge yükle
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            Pasaport Ekle
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            Vize Ekle
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            Ödeme Ekle
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            Bakiye Ekle
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            Katılımcıyı Sil
                        </a>
                      </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Toplam Proje</p>
                                    <h4 class="mb-0">1,235</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Toplam Borç</p>
                                    <h4 class="mb-0">1,235</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Toplam Ödeme</p>
                                    <h4 class="mb-0">1,235</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Toplam Belge</p>
                                    <h4 class="mb-0">1,235</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Hastalık</p>
                                    <h4 class="mb-0">1,235</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Alerji</p>
                                    <h4 class="mb-0">1,235</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Projeler</h4>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Proje Adı</th>
                                    <th scope="col">Tarihi</th>
                                    <th scope="col">Ülke</th>
                                    <th scope="col">Katılımcı Sayısı</th>
                                  </tr>
                                </thead>
                                <tbody></tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Acil Durum Kişileri</h4>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">İsim</th>
                                    <th scope="col">Yakınlık</th>
                                    <th scope="col">Telefon</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->EmergencyContact as $item)
                                        <tr>
                                            <td>
                                                {{$item->id}}
                                            </td>
                                            <td>
                                                {{$item->name}}
                                            </td>
                                            <td>
                                                {{$item->Proximity->name}}
                                            </td>
                                            <td>
                                                {{$item->phone}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Hastalık Bilgileri</h4>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Hastalık Adı</th>
                                    <th scope="col">Talimatlar</th>
                                    <th scope="col">İlaçlar</th>
                                    <th scope="col">Ölüm Riski</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->Diseases as $item)
                                        <tr>
                                            <td>
                                                {{$item->id}}
                                            </td>
                                            <td>
                                                {{$item->disease}}
                                            </td>
                                            <td>
                                                {{$item->intructions}}
                                            </td>
                                            <td>
                                                {{$item->drugs}}
                                            </td>
                                            <td>
                                                @if ($item->is_fatal == 1)
                                                    <span class="badge bg-danger">VAR</span>
                                                @else
                                                    <span class="badge bg-primary">Yok</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Alerji Bilgileri</h4>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Alerji Adı</th>
                                    <th scope="col">Talimatlar</th>
                                    <th scope="col">İlaçlar</th>
                                    <th scope="col">Ölüm Riski</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->Allergies as $item)
                                        <tr>
                                            <td>
                                                {{$item->id}}
                                            </td>
                                            <td>
                                                {{$item->allergy}}
                                            </td>
                                            <td>
                                                {{$item->intructions}}
                                            </td>
                                            <td>
                                                {{$item->drugs}}
                                            </td>
                                            <td>
                                                @if ($item->is_fatal == 1)
                                                    <span class="badge bg-danger">VAR</span>
                                                @else
                                                    <span class="badge bg-primary">Yok</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Belgeler</h4>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Belge</th>
                                    <th scope="col">Belge Türü</th>
                                    <th scope="col">Durum</th>
                                  </tr>
                                </thead>
                                <tbody></tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Katılımcılar</h4>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">İsim</th>
                                    <th scope="col">E-posta</th>
                                    <th scope="col">Telefon</th>
                                    <th scope="col">Durum</th>
                                  </tr>
                                </thead>
                                <tbody></tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="UploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Fotoğraf Yükle</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="address" class="form-label">Bilgisayardan Seç</label>
                    <input type="file" id="file" class="form-control" onchange="upload()">
                    <input type="hidden" id="image">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
              <button type="button" class="btn btn-primary" onclick="saveLogo({{$user->id}})">Kaydet</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="emergencyContactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Acil Durum Kişisi Ekle</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="emergency_proximity" class="form-label">Yakınlık Derecesi</label>
                    <select name="proximity" id="emergency_proximity" class="form-control">
                        <option value="0"> Seçin...</option>
                        @foreach ($proximities as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="emergency_name" class="form-label">İsim</label>
                            <input type="text" class="form-control" id="emergency_name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="emergency_phone" class="form-label">Telefon</label>
                            <input type="text" class="form-control" id="emergency_phone">
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
              <button type="button" class="btn btn-primary" onclick="saveEmergencyContact({{$user->id}})">Kaydet</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="diseaseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Hastalık Ekle</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="mb-3">
                    <label for="disease" class="form-label">Hastalık Adı</label>
                    <input type="text" class="form-control" id="disease">
                </div>
                <div class="mb-3">
                    <label for="intructions" class="form-label">Talimatlar</label>
                    <textarea class="form-control" id="intructions" rows="5"></textarea>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="drugs" class="form-label">İlaçlar</label>
                            <input type="text" class="form-control" id="drugs">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="emergency_name" class="form-label">Bu hastalık ölümcül mü?</label>
                            <select name="is_fatal" id="is_fatal" class="form-control">
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
              <button type="button" class="btn btn-primary" onclick="saveDisease({{$user->id}})">Kaydet</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="alergyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Alerji Ekle</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="mb-3">
                    <label for="allergy" class="form-label">Alerji Adı</label>
                    <input type="text" class="form-control" id="allergy">
                </div>
                <div class="mb-3">
                    <label for="allergy_intructions" class="form-label">Talimatlar</label>
                    <textarea class="form-control" id="allergy_intructions" rows="5"></textarea>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="allergy_drugs" class="form-label">İlaçlar</label>
                            <input type="text" class="form-control" id="allergy_drugs">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="allergy_is_fatal" class="form-label">Bu alerji ölümcül mü?</label>
                            <select name="allergy_is_fatal" id="allergy_is_fatal" class="form-control">
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
              <button type="button" class="btn btn-primary" onclick="saveAllergy({{$user->id}})">Kaydet</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('script')
    <script>
        function upload() {
            var formData = new FormData();
            var fileInput = document.getElementById('file');
            formData.append('file', fileInput.files[0]);

            axios.post('/upload', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function (res) {
                toastr[res.data.type](res.data.message)
                if(res.data.status){
                    $("#image").val(res.data.url);
                }
            });
    }

    function saveLogo(id){
        var image = $("#image").val();
        axios.post('/participant/save-image', {'image': image, 'id': id})
            .then(res => {
                toastr[res.data.type](res.data.message);
               if(res.data.status){
                setInterval(() => {
                    window.location.reload();
                }, 500);
               } 
            });
    }

    function saveEmergencyContact(id){
        var proximity = $("#emergency_proximity").val();
        var name = $("#emergency_name").val();
        var phone = $("#emergency_phone").val();

        axios.post('/participant/add/emergency-contact', {
            'proximity': proximity,
            'name': name,
            'phone': phone,
            'id': id
        }).then((res) => {
            toastr[res.data.type](res.data.message);
            if(res.data.status){
                setInterval(() => {
                    window.location.reload();
                }, 500);
            }
        });
    }

    function saveDisease(id){
        var disease = $("#disease").val();
        var intructions = $("#intructions").val();
        var drugs = $("#drugs").val();
        var is_fatal = $("#is_fatal").val();

        axios.post('/participant/add/disease', {
            'disease': disease,
            'intructions': intructions,
            'drugs': drugs,
            'is_fatal': is_fatal,
            'id': id
        }).then((res) => {
            toastr[res.data.type](res.data.message);
            if(res.data.status){
                setInterval(() => {
                    window.location.reload();
                }, 500);
            }
        });
    }
    function saveAllergy(id){
        var allergy = $("#allergy").val();
        var intructions = $("#allergy_intructions").val();
        var drugs = $("#allergy_drugs").val();
        var is_fatal = $("#allergy_is_fatal").val();

        axios.post('/participant/add/allergy', {
            'allergy': allergy,
            'intructions': intructions,
            'drugs': drugs,
            'is_fatal': is_fatal,
            'id': id
        }).then((res) => {
            toastr[res.data.type](res.data.message);
            if(res.data.status){
                setInterval(() => {
                    window.location.reload();
                }, 500);
            }
        });
    }
    </script>
@endsection