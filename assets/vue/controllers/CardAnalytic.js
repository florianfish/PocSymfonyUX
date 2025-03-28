import { defineComponent } from 'vue';

export default defineComponent({
    props: [
        'title', 'icon', 'value'
    ],
    template: `
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">{{ title }}</h5>
                    </div>

                    <div class="col-auto">
                        <div class="stat text-primary">
                            <i class="align-middle" :data-feather="icon"></i>
                        </div>
                    </div>
                </div>

                <h1 class="mt-1 mb-3">{{ value }}</h1>
            </div>
        </div>
    `,
    methods: {
        formattedAmount() {
            return this.amount.toLocaleString('fr-FR');
        }
    }
});