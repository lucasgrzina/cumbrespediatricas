<script type="text/x-template" id="switch-button">
    <label :class="classObject">
        <span class="vue-switcher__label" v-if="shouldShowLabel">
            <span v-if="label" v-text="label"></span>
            <span v-if="!label && value" v-text="textEnabled"></span>
            <span v-if="!label && !value" v-text="textDisabled"></span>
        </span>

        <input type="checkbox" :disabled="disabled" @change="trigger" :checked="value">

        <div></div>
    </label>
</script>
@section('css')
<style>
.vue-switcher{margin:10px 0px 5px}
.vue-switcher{position:relative;display:inline-block}.vue-switcher__label{display:block;font-size:10px;margin-bottom:5px}.vue-switcher input{opacity:0;width:100%;height:100%;position:absolute;z-index:1;cursor:pointer}.vue-switcher div{height:15px;width:36px;position:relative;border-radius:30px;display:-ms-flex;display:flex;align-items:center;justify-content:flex-start;cursor:pointer;transition:.2s linear,background-color .2s linear}.vue-switcher div:after{content:"";height:20px;width:20px;border-radius:100px;display:block;transition:.15s linear,background-color .15s linear;position:absolute;left:100%;margin-left:-18px;cursor:pointer;top:-3px;box-shadow:0 1px 5px 0 rgba(0,0,0,.1)}.vue-switcher--unchecked div{justify-content:flex-end}.vue-switcher--unchecked div:after{left:15px}.vue-switcher--disabled div{opacity:.3}.vue-switcher--disabled input{cursor:not-allowed}.vue-switcher--bold div{top:-8px;height:26px;width:51px}.vue-switcher--bold div:after{margin-left:-24px;top:3px}.vue-switcher--bold--unchecked div:after{left:28px}.vue-switcher--bold .vue-switcher__label span{padding-bottom:7px;display:inline-block}.vue-switcher-theme--default.vue-switcher-color--default div{background-color:#b7b7b7}.vue-switcher-theme--default.vue-switcher-color--default div:after{background-color:#9d9d9d}.vue-switcher-theme--default.vue-switcher-color--default.vue-switcher--unchecked div{background-color:#aaa}.vue-switcher-theme--default.vue-switcher-color--default.vue-switcher--unchecked div:after{background-color:#c4c4c4}.vue-switcher-theme--default.vue-switcher-color--blue div{background-color:#77b0c8}.vue-switcher-theme--default.vue-switcher-color--blue div:after{background-color:#539bb9}.vue-switcher-theme--default.vue-switcher-color--blue.vue-switcher--unchecked div{background-color:#c0dae5}.vue-switcher-theme--default.vue-switcher-color--blue.vue-switcher--unchecked div:after{background-color:#77b0c8}.vue-switcher-theme--default.vue-switcher-color--red div{background-color:#c87777}.vue-switcher-theme--default.vue-switcher-color--red div:after{background-color:#b95353}.vue-switcher-theme--default.vue-switcher-color--red.vue-switcher--unchecked div{background-color:#e5c0c0}.vue-switcher-theme--default.vue-switcher-color--red.vue-switcher--unchecked div:after{background-color:#c87777}.vue-switcher-theme--default.vue-switcher-color--yellow div{background-color:#c9c377}.vue-switcher-theme--default.vue-switcher-color--yellow div:after{background-color:#bab353}.vue-switcher-theme--default.vue-switcher-color--yellow.vue-switcher--unchecked div{background-color:#e6e3c0}.vue-switcher-theme--default.vue-switcher-color--yellow.vue-switcher--unchecked div:after{background-color:#c9c377}.vue-switcher-theme--default.vue-switcher-color--orange div{background-color:#c89577}.vue-switcher-theme--default.vue-switcher-color--orange div:after{background-color:#b97953}.vue-switcher-theme--default.vue-switcher-color--orange.vue-switcher--unchecked div{background-color:#e5cec0}.vue-switcher-theme--default.vue-switcher-color--orange.vue-switcher--unchecked div:after{background-color:#c89577}.vue-switcher-theme--default.vue-switcher-color--green div{background-color:#77c88d}.vue-switcher-theme--default.vue-switcher-color--green div:after{background-color:#53b96e}.vue-switcher-theme--default.vue-switcher-color--green.vue-switcher--unchecked div{background-color:#c0e5ca}.vue-switcher-theme--default.vue-switcher-color--green.vue-switcher--unchecked div:after{background-color:#77c88d}.vue-switcher-theme--bulma.vue-switcher-color--default div{background-color:#dcdcdc}.vue-switcher-theme--bulma.vue-switcher-color--default div:after{background-color:#f5f5f5}.vue-switcher-theme--bulma.vue-switcher-color--default.vue-switcher--unchecked div{background-color:#e8e8e8}.vue-switcher-theme--bulma.vue-switcher-color--default.vue-switcher--unchecked div:after{background-color:#f5f5f5}.vue-switcher-theme--bulma.vue-switcher-color--primary div{background-color:#05ffda}.vue-switcher-theme--bulma.vue-switcher-color--primary div:after{background-color:#00d1b2}.vue-switcher-theme--bulma.vue-switcher-color--primary.vue-switcher--unchecked div{background-color:#6bffe9}.vue-switcher-theme--bulma.vue-switcher-color--primary.vue-switcher--unchecked div:after{background-color:#05ffda}.vue-switcher-theme--bulma.vue-switcher-color--blue div{background-color:#5e91e3}.vue-switcher-theme--bulma.vue-switcher-color--blue div:after{background-color:#3273dc}.vue-switcher-theme--bulma.vue-switcher-color--blue.vue-switcher--unchecked div{background-color:#b5ccf2}.vue-switcher-theme--bulma.vue-switcher-color--blue.vue-switcher--unchecked div:after{background-color:#5e91e3}.vue-switcher-theme--bulma.vue-switcher-color--red div{background-color:#ff6b89}.vue-switcher-theme--bulma.vue-switcher-color--red div:after{background-color:#ff3860}.vue-switcher-theme--bulma.vue-switcher-color--red.vue-switcher--unchecked div{background-color:#ffd1da}.vue-switcher-theme--bulma.vue-switcher-color--red.vue-switcher--unchecked div:after{background-color:#ff6b89}.vue-switcher-theme--bulma.vue-switcher-color--yellow div{background-color:#ffe78a}.vue-switcher-theme--bulma.vue-switcher-color--yellow div:after{background-color:#ffdd57}.vue-switcher-theme--bulma.vue-switcher-color--yellow.vue-switcher--unchecked div{background-color:#fffcf0}.vue-switcher-theme--bulma.vue-switcher-color--yellow.vue-switcher--unchecked div:after{background-color:#ffe78a}.vue-switcher-theme--bulma.vue-switcher-color--green div{background-color:#3dde75}.vue-switcher-theme--bulma.vue-switcher-color--green div:after{background-color:#22c65b}.vue-switcher-theme--bulma.vue-switcher-color--green.vue-switcher--unchecked div{background-color:#94edb3}.vue-switcher-theme--bulma.vue-switcher-color--green.vue-switcher--unchecked div:after{background-color:#3dde75}.vue-switcher-theme--bootstrap.vue-switcher-color--default div{background-color:#e6e6e6}.vue-switcher-theme--bootstrap.vue-switcher-color--default div:after{background-color:#f0f0f0}.vue-switcher-theme--bootstrap.vue-switcher-color--default.vue-switcher--unchecked div{background-color:#f5f5f5}.vue-switcher-theme--bootstrap.vue-switcher-color--default.vue-switcher--unchecked div:after{background-color:#f0f0f0}.vue-switcher-theme--bootstrap.vue-switcher-color--primary div{background-color:#4f93ce}.vue-switcher-theme--bootstrap.vue-switcher-color--primary div:after{background-color:#337ab7}.vue-switcher-theme--bootstrap.vue-switcher-color--primary.vue-switcher--unchecked div{background-color:#9fc4e4}.vue-switcher-theme--bootstrap.vue-switcher-color--primary.vue-switcher--unchecked div:after{background-color:#4f93ce}.vue-switcher-theme--bootstrap.vue-switcher-color--success div{background-color:#80c780}.vue-switcher-theme--bootstrap.vue-switcher-color--success div:after{background-color:#5cb85c}.vue-switcher-theme--bootstrap.vue-switcher-color--success.vue-switcher--unchecked div{background-color:#c7e6c7}.vue-switcher-theme--bootstrap.vue-switcher-color--success.vue-switcher--unchecked div:after{background-color:#80c780}.vue-switcher-theme--bootstrap.vue-switcher-color--info div{background-color:#85d0e7}.vue-switcher-theme--bootstrap.vue-switcher-color--info div:after{background-color:#5bc0de}.vue-switcher-theme--bootstrap.vue-switcher-color--info.vue-switcher--unchecked div{background-color:#daf1f8}.vue-switcher-theme--bootstrap.vue-switcher-color--info.vue-switcher--unchecked div:after{background-color:#85d0e7}.vue-switcher-theme--bootstrap.vue-switcher-color--warning div{background-color:#f4c37d}.vue-switcher-theme--bootstrap.vue-switcher-color--warning div:after{background-color:#f0ad4e}.vue-switcher-theme--bootstrap.vue-switcher-color--warning.vue-switcher--unchecked div{background-color:#fceedb}.vue-switcher-theme--bootstrap.vue-switcher-color--warning.vue-switcher--unchecked div:after{background-color:#f4c37d}.vue-switcher-theme--bootstrap.vue-switcher-color--danger div{background-color:#d9534f}.vue-switcher-theme--bootstrap.vue-switcher-color--danger div:after{background-color:#c9302c}.vue-switcher-theme--bootstrap.vue-switcher-color--danger.vue-switcher--unchecked div{background-color:#eba5a3}.vue-switcher-theme--bootstrap.vue-switcher-color--danger.vue-switcher--unchecked div:after{background-color:#d9534f}    
</style>
@endsection
@section('scripts')
    <script>
        'use strict';

        _components['switch-button'] = {
            delimiters: ['(#', '#)'],
            template: '#switch-button',
            props: {
                typeBold: {
                    default: false
                },

                value: {
                    default: false
                },

                disabled: {
                    default: false
                },

                label: {
                    default: ''
                },

                textEnabled: {
                    default: ''
                },

                textDisabled: {
                    default: ''
                },

                /*color: {
                    default: 'default'
                },*/

                theme: {
                    default: 'default'
                },

                emitOnMount: {
                    default: true
                }
            },

            mounted: function mounted() {
                if (this.emitOnMount) {
                    this.$emit('input', this.value);
                }
            },

            methods: {
                trigger: function trigger(e) {
                    this.$emit('input', e.target.checked);
                    this.change(e.target.checked);
                },
                change: function (value) {
                    this.$emit('onchange', value);    
                }
            },

            computed: {
                classObject: function classObject() {
                    var _ref;

                    var color = (this.value ? 'success' : 'danger');
                    var value = this.value;
                    var theme = this.theme;
                    var typeBold = this.typeBold;
                    var disabled = this.disabled;

                    return _ref = {
                        'vue-switcher': true
                    }, _defineProperty(_ref, 'vue-switcher--unchecked', !value), _defineProperty(_ref, 'vue-switcher--disabled', disabled), _defineProperty(_ref, 'vue-switcher--bold', typeBold), _defineProperty(_ref, 'vue-switcher--bold--unchecked', typeBold && !value), _defineProperty(_ref, 'vue-switcher-theme--' + theme, color), _defineProperty(_ref, 'vue-switcher-color--' + color, color), _ref;
                },
                shouldShowLabel: function shouldShowLabel() {
                    return this.label !== '' || this.textEnabled !== '' || this.textDisabled !== '';
                }
            }

        };
    </script>
@endsection