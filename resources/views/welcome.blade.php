<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>АДС</title>

    <style>
        label {
            display: block;
        }
    </style>

    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.js"></script>
</head>
<body>
<div id="app">
    <input placeholder="id" type="number" min="0" v-model="idInput" required> <button @click="getData()">проверить</button>

    <div v-show="loading">Загрузка...</div>

    <div v-if="dataTable">
        <table style="width:100%; text-align: left">
            <tr style="text-align: left;" v-for="data in dataTable">
                <td style="text-align: left; width: 2%">@{{ data.id }}</td>
                <td style="text-align: left; width: 3%">@{{ data.name }}</td>
                <td style="text-align: left; width: 3%">@{{ data.email }}</td>
                <td style="text-align: left; width: 5%">@{{ data.password }}</td>
                <td style="text-align: left; width: 3%">@{{ data.city }}</td>
                <td style="text-align: left; width: 3%">@{{ data.year }}</td>
                <td style="text-align: left; width: 5%">@{{ data.domainName }}</td>
                <td style="text-align: left; width: 5%">@{{ data.creditCardNumber }}</td>
                <td style="text-align: left; width: 5%">@{{ data.word }}</td>
                <td style="text-align: left; width: 25%">@{{ data.paragraph }}</td>
            </tr>
        </table>
    </div>

    <div v-if="error">Информация по данному ID не доступна</div>

</div>

<script>
    new Vue({
        el: '#app',
        data: {
            loading: false,
            dataTable: null,
            error: false,
            idInput: ''
        },
        methods: {
            async getData () {
                this.error = false;
                this.loading = true;
                try{
                    let datas = await axios.get('http://127.0.0.1:8000/api/data/'+this.idInput);
                    this.dataTable = datas.data;
                    this.loading = false;
                }catch(err){
                    this.dataTable = null;
                    this.error = true;
                    this.loading = false;
                }
            }
        }
    })
</script>
</body>
</html>