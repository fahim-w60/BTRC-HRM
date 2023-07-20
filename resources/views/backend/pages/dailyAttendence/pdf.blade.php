<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
</head>
<style>
    table, th, td {
      border: black;
    }
    </style>
<body>



            {{-- <img src="{{ asset("Custom/img/btrc-logo.png") }}" style="height: 80px" alt=""> --}}

             <br><br>

                <h6> Name: {{ $name }}</h6>
                <h6> Date:{{ date('Y-m-d') }} </h6>
                <h6> Designation: {{ $designation }}</h6>
                <h6> Department: {{ $department }}</h6>

            <br><br>
                    <table class="blueTable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>status</th>
                                <th>inTime</th>
                                <th>outTime</th>
                                <th>lateStatus</th>
                                <th>totalDuty</th>
                                <th>isFriday</th>
                                <th>holiday</th>
                            </tr>
                        </thead>
                        <tbody>

                                <tr>
                                    <td>jgvuygyu</td>
                                    <td>jgvuygyu</td>
                                    <td>jgvuygyu</td>
                                    <td>jgvuygyu</td>
                                    <td>jgvuygyu</td>
                                    <td>jgvuygyu</td>
                                    <td>jgvuygyu</td>
                                    <td>jgvuygyu</td>
                                    <!-- rest of the table data and logic here -->
                                </tr>

                        </tbody>
                    </table>

</body>
</html>
