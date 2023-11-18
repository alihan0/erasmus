@extends('master')

@section('title', 'Personeller')
    
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title border-bottom pb-3">Yeni Personel</h4>
                    
                    <form action="javascript:void(0)" id="userForm">
                        <div class="mb-3">
                            <label for="company" class="form-label">Firma/Kurum Adı</label>
                            <input type="text" class="form-control" id="company"  name="company">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">İsim</label>
                            <input type="text" class="form-control" id="name"  name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-posta</label>
                            <input type="text" class="form-control" id="email"  name="email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="text" class="form-control" id="phone"  name="phone">
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="country" class="form-label">Ülke</label>
                                    <input type="text" class="form-control" id="country"  name="country">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="city" class="form-label">İl</label>
                                    <input type="text" class="form-control" id="city"  name="city">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="district" class="form-label">İlçe</label>
                                    <input type="text" class="form-control" id="district"  name="district">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Adres</label>
                            <input type="text" class="form-control" id="address"  name="address">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Şifre</label>
                            <input type="text" class="form-control" id="password"  name="password">
                        </div>
                        <button type="submit" class="btn btn-primary float-end" onclick="saveUser()"><i class="fas fa-save"></i> Oluştur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function saveUser(){
            axios.post('/user/create', $('#userForm').serialize())
                .then(res => {

                    toastr[res.data.type](res.data.message);
                   if(res.data.status){
                    setInterval(() => {
                        window.location.assign('/user');
                    }, 500);
                   } 
                });
        }
    </script>
@endsection