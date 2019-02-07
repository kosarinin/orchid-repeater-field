@component($typeForm,get_defined_vars())
    <div class="repeater"
         data-controller="fields--repeater"
         data-fields--repeater-handler="{{$handler}}"
         data-fields--repeater-options="{{ json_encode($attributes) }}"
         data-fields--repeater-template="{{ $template }}"
         data-fields--repeater-url="{{route('platform.systems.widget', Base64Url\Base64Url::encode($handler))}}"
         data-fields--repeater-value="{{ json_encode($value) }}">
        <input type="hidden" name="{{ $name }}" data-target="fields--repeater.repeaterField" value=""/>
        <div class="row">
            <div class="col-md-12">
                <section class="content b wrapper-xs mb-2 empty loading" data-target="fields--repeater.content">
                    <div class="no-value-message">
                        {{ __('Click the "Add Block" button below to start adding the items.') }}
                    </div>
                    <div class="loading-message">
                        <span class="icon icon-loading"></span>
                    </div>
                    <section class="repeaters_container" data-target="fields--repeater.blocks"
                             data-container-key="{{ $name }}"></section>
                </section>
                <button class="btn btn-default pull-right" type="button"
                        data-action="click->fields--repeater#addNewBlock"
                        data-target="fields--repeater.addBlockButton">
                    <i class="icon-plus m-r-xs"></i> {{ __('Add block') }}
                </button>
            </div>
        </div>

        @push('scripts')
            @include('platform::partials.fields._repeater_field_template')
        @endpush
    </div>
@endcomponent