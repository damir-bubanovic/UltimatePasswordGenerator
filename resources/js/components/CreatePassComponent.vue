<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Card Start -->
                <div class="card">
                    <!-- Card Header -->
                    <div class="card-header">
                        <button class="btn btn-dark btn-lg" v-on:click="createPass">Smash to Generate New Password</button>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" id="password" v-model="password" class="form-control" aria-label="newPassword" aria-describedby="new-password">
                            <span class="input-group-btn">
                                <button class="btn btn-outline-dark" type="button" v-on:click="copyPassword">Copy</button>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>

        <!-- Alert -->
        <div v-show="alert" class="alert alert-primary" role="alert">
            Dude, select at least one checkbox!
        </div>

        <!-- Form Options -->
        <div class="form-combinations">
            <input class="form-combinations-input" type="checkbox" value="" id="uppercase" v-model="uppercase">
            <label class="form-combinations-label" for="uppercase">
                Uppercase
            </label>
            <input class="form-combinations-input" type="checkbox" value="" id="lowercase" v-model="lowercase">
            <label class="form-combinations-label" for="lowercase">
                Lowercase
            </label>
            <input class="form-combinations-input" type="checkbox" value="" id="numbers" v-model="numbers">
            <label class="form-combinations-label" for="numbers">
                Numbers
            </label>
            <input class="form-combinations-input" type="checkbox" value="" id="symbols" v-model="symbols">
            <label class="form-combinations-label" for="symbols">
                Symbols
            </label>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                uppercase: true,
                lowercase: true,
                numbers: true,
                symbols: true,
                alert: false,
                password: 'Your New Password will generate Here!'
            }
        },
        methods: {
            createPass() {
                var selected = false;

                var data = {
                    uppercase: this.uppercase,
                    lowercase: this.lowercase,
                    numbers: this.numbers,
                    symbols: this.symbols,
                }

                if (data.uppercase == false && data.lowercase == false && data.numbers == false & data.symbols == false) {
                    this.alert = true;
                    setTimeout(() => {
                        this.alert = false;
                    }, 3000);
                } else {
                    axios.post('api/generate-pass', data)
                        .then((response) => {
                            this.password = response.data;
                        }).catch((response) => {
                            console.log('Error ', response);
                        });
                }

            },
            copyPassword() {
                var copyText = document.querySelector("#password");
                copyText.select();
                document.execCommand("copy");
            }

        }
    }
</script>
