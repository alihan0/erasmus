@extends('master')

@section('title', 'Katılımcı Ekle')
    
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title border-bottom pb-3">Yeni Katılımcı</h4>
                    
                    <form action="javascript:void(0)" id="participantForm">
                        <div class="mb-3">
                            <label for="type" class="form-label">Katılımcı Türü</label>
                            <select name="type" id="type" class="form-control">
                                <option value="0">Seçin...</option>
                                @foreach ($types as $item)
                                    <option  value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
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
                                    <label for="gender" class="form-label">Cinsiyet</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="0">Seçin...</option>
                                        <option value="1">Erkek</option>
                                        <option value="2">Kadın</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="birthdate" class="form-label">Doğum Tarihi</label>
                                    <input type="date" class="form-control" id="birthdate"  name="birthdate">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="blood_group" class="form-label">Kan Grubu</label>
                                    <select name="blood_group" id="blood_group" class="form-control">
                                        <option value="0">Seçin...</option>
                                        <option value="1">A RH +</option>
                                        <option value="2">A RH -</option>
                                        <option value="3">B RH +</option>
                                        <option value="4">B RH -</option>
                                        <option value="5">AB RH +</option>
                                        <option value="6">AB RH -</option>
                                        <option value="7">0 RH +</option>
                                        <option value="8">0 RH -</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="height" class="form-label">Boy</label>
                                    <input type="text" class="form-control" id="height"  name="height">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="weight" class="form-label">Kilo</label>
                                    <input type="text" class="form-control" id="weight"  name="weight">
                                </div>
                            </div>
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
                        <button type="submit" class="btn btn-primary float-end" onclick="saveParticipant()"><i class="fas fa-save"></i> Oluştur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function saveParticipant(){
            axios.post('/participant/create', $('#participantForm').serialize())
                .then(res => {
                    toastr[res.data.type](res.data.message);
                   if(res.data.status){
                    setInterval(() => {
                        window.location.assign('/participant/detail/' + res.data.id);
                    }, 500);
                   } 
                });
        }
    </script>
@endsection