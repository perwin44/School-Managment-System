<div class="row setup-content" id="step-2">
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>

            <div class="form-row">
                <div class="col">
                    <label for="Name_Mother">{{ trans('Parent_trans.Name_Mother') }}</label>
                    <input id="Name_Mother" type="text" wire:model.live="Name_Mother" class="form-control">
                    @error('Name_Mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="Name_Mother_en">{{ trans('Parent_trans.Name_Mother_en') }}</label>
                    <input id="Name_Mother_en" type="text" wire:model.live="Name_Mother_en" class="form-control">
                    @error('Name_Mother_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3">
                    <label for="Job_Mother">{{ trans('Parent_trans.Job_Mother') }}</label>
                    <input id="Job_Mother" type="text" wire:model.live="Job_Mother" class="form-control">
                    @error('Job_Mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="Job_Mother_en">{{ trans('Parent_trans.Job_Mother_en') }}</label>
                    <input id="Job_Mother_en" type="text" wire:model.live="Job_Mother_en" class="form-control">
                    @error('Job_Mother_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="National_ID_Mother">{{ trans('Parent_trans.National_ID_Mother') }}</label>
                    <input id="National_ID_Mother" type="text" wire:model.live="National_ID_Mother" class="form-control">
                    @error('National_ID_Mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="Passport_ID_Mother">{{ trans('Parent_trans.Passport_ID_Mother') }}</label>
                    <input id="Passport_ID_Mother" type="text" wire:model.live="Passport_ID_Mother" class="form-control">
                    @error('Passport_ID_Mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="Phone_Mother">{{ trans('Parent_trans.Phone_Mother') }}</label>
                    <input id="Phone_Mother" type="text" wire:model.live="Phone_Mother" class="form-control">
                    @error('Phone_Mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Nationality_Mother_id">{{ trans('Parent_trans.Nationality_Father_id') }}</label>
                    <select id="Nationality_Mother_id" class="custom-select mr-sm-2 my-1" wire:model.live="Nationality_Mother_id">
                        <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                        @foreach ($Nationalities as $National)
                            <option value="{{ $National->id }}">{{ $National->Name }}</option>
                        @endforeach
                    </select>
                    @error('Nationality_Mother_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="Blood_Type_Father_id">{{ trans('Parent_trans.Blood_Type_Father_id') }}</label>
                    <select id="Blood_Type_Father_id" class="custom-select mr-sm-2 my-1" wire:model.live="Blood_Type_Mother_id">
                        <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                        @foreach ($Type_Bloods as $Type_Blood)
                            <option value="{{ $Type_Blood->id }}">{{ $Type_Blood->Name }}</option>
                        @endforeach
                    </select>
                    @error('Blood_Type_Mother_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="Religion_Mother_id">{{ trans('Parent_trans.Religion_Father_id') }}</label>
                    <select id="Religion_Mother_id" class="custom-select mr-sm-2 my-1" wire:model.live="Religion_Mother_id">
                        <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                        @foreach ($Religions as $Religion)
                            <option value="{{ $Religion->id }}">{{ $Religion->Name }}</option>
                        @endforeach
                    </select>
                    @error('Religion_Mother_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="Address_Mother">{{ trans('Parent_trans.Address_Mother') }}</label>
                <textarea class="form-control" wire:model.live="Address_Mother" id="Address_Mother" rows="4"></textarea>
                @error('Address_Mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
                {{ trans('Parent_trans.Back') }}
            </button>


            @if($updateMode)
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondStepSubmit_edit"
                    type="button">{{trans('Parent_trans.Next')}}
            </button>
        @else
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                    wire:click="secondStepSubmit">{{trans('Parent_trans.Next')}}</button>
        @endif
        </div>
    </div>
</div>
