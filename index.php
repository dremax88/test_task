<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.1/axios.js"></script>
</head>
<body>
<div id="app">
    <h1>Добавление животных</h1>
    <select v-model="type">
        <option disabled value="">Выберите вид животного</option>
        <option>Корова</option>
        <option>Курица</option>
    </select>
    <select v-model="quantity">
        <option disabled value="">Количество добавляемых</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
        <option>13</option>
        <option>14</option>
        <option>15</option>
        <option>16</option>
        <option>17</option>
        <option>18</option>
        <option>19</option>
        <option>20</option>
    </select>
    <button v-on:click="select()">Добавить в хлев и проиндексировать</button>
    <br>
    <p  v-if="milk!='null'">
        <h2>Собранно</h2>
        <br>
        <b>Молока: </b><span>{{milk}} литров</span>
        <br>
        <b>Яиц: </b><span>{{eggs}} штук</span>
    </p>
    <br>
    <button v-on:click="getData()">Посчитать сумму</button>
</div>

</body>
<script>
    new Vue({
        el: '#app',
        data() {
            return {
                type: '',
                quantity: '',
                info: null,
                milk: '--',
                eggs: '--'
            };
        },
        mounted()
        {
            var url='/api/lib/cotrollerSumProduct.php';
            axios
                .get(url)
                .then(response => (this.milk = response.data.milk));
            axios
                .get(url)
                .then(response => (this.eggs = response.data.eggs));
        },
        methods:{
            select: function () {
            if ((this.type!=='') && (this.quantity!==''))
                {
                    if(this.type=='Корова')
                        {
                            var animalType='Cow';
                        }
                    else
                        {
                            var animalType='Chicken';
                        }
                    var url='/api/lib/controllerAddAnimal.php?type='+animalType+'&quantity='+this.quantity;


                    axios
                        .get(url)
                        .then(response => (this.info = response));
                    if (this.info!='')
                        {
                            alert('Успех')
                        }
                }
             else
                 {
                     alert('error');
                 }

            },
            getData: function ()
                {
                    var url='/api/lib/cotrollerSumProduct.php';
                    axios
                        .get(url)
                        .then(response => (this.milk = response.data.milk));
                    axios
                        .get(url)
                        .then(response => (this.eggs = response.data.eggs));
                }
        },


    })
</script>

</html>
