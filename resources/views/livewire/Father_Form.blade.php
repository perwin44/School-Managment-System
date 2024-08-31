<div class="row setup-content" id="step-1">
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="email">{{ trans('Parent_trans.Email') }}</label>
                    <input id="email" type="email" wire:model.live="email" class="form-control">
                    @error('Email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="password">{{ trans('Parent_trans.Password') }}</label>
                    <input id="password" type="password" wire:model.live="password" class="form-control">
                    @error('Password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="Name_Father">{{ trans('Parent_trans.Name_Father') }}</label>
                    <input id="Name_Father" type="text" wire:model.live="Name_Father" class="form-control">
                    @error('Name_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="Name_Father_en">{{ trans('Parent_trans.Name_Father_en') }}</label>
                    <input id="Name_Father_en" type="text" wire:model.live="Name_Father_en" class="form-control">
                    @error('Name_Father_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3">
                    <label for="Job_Father">{{ trans('Parent_trans.Job_Father') }}</label>
                    <input id="Job_Father" type="text" wire:model.live="Job_Father" class="form-control">
                    @error('Job_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="Job_Father_en">{{ trans('Parent_trans.Job_Father_en') }}</label>
                    <input id="Job_Father_en" type="text" wire:model.live="Job_Father_en" class="form-control">
                    @error('Job_Father_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="National_ID_Father">{{ trans('Parent_trans.National_ID_Father') }}</label>
                    <input id="National_ID_Father" type="text" wire:model.live="National_ID_Father" class="form-control">
                    @error('National_ID_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="Passport_ID_Father">{{ trans('Parent_trans.Passport_ID_Father') }}</label>
                    <input id="Passport_ID_Father" type="text" wire:model.live="Passport_ID_Father" class="form-control">
                    @error('Passport_ID_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="Phone_Father">{{ trans('Parent_trans.Phone_Father') }}</label>
                    <input id="Phone_Father" type="text" wire:model.live="Phone_Father" class="form-control">
                    @error('Phone_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Nationality_Father_id">{{ trans('Parent_trans.Nationality_Father_id') }}</label>
                    <select id="Nationality_Father_id" class="custom-select mr-sm-2 my-1" wire:model.live="Nationality_Father_id">
                        <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                        @foreach ($Nationalities as $National)
                            <option value="{{ $National->id }}">{{ $National->Name }}</option>
                        @endforeach
                    </select>
                    @error('Nationality_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="Blood_Type_Father_id">{{ trans('Parent_trans.Blood_Type_Father_id') }}</label>
                    <select id="Blood_Type_Father_id" class="custom-select mr-sm-2 my-1" wire:model.live="Blood_Type_Father_id">
                        <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                        @foreach ($Type_Bloods as $Type_Blood)
                            <option value="{{ $Type_Blood->id }}">{{ $Type_Blood->Name }}</option>
                        @endforeach
                    </select>
                    @error('Blood_Type_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="Religion_Father_id">{{ trans('Parent_trans.Religion_Father_id') }}</label>
                    <select id="Religion_Father_id" class="custom-select mr-sm-2 my-1" wire:model.live="Religion_Father_id">
                        <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                        @foreach ($Religions as $Religion)
                            <option value="{{ $Religion->id }}">{{ $Religion->Name }}</option>
                        @endforeach
                    </select>
                    @error('Religion_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <label for="Address_Father">{{ trans('Parent_trans.Address_Father') }}</label>
                <textarea class="form-control" wire:model.live="Address_Father" id="Address_Father" rows="4"></textarea>
                @error('Address_Father')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            @if($updateMode)
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit_edit"
                    type="button">{{trans('Parent_trans.Next')}}
            </button>
        @else
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                    type="button">{{trans('Parent_trans.Next')}}
            </button>
        @endif
        </div>
    </div>

</div>
