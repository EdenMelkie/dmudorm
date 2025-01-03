<?php
namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
public function model(array $row)
{
return new Student([
'id' => $row['id'],
'first_name' => $row['first_name'],
'second_name' => $row['second_name'],
'last_name' => $row['last_name'],
'email' => $row['email'],
'password' => Hash::make($row['password']),
'entry_year' => $row['entry_year'],
'department' => $row['department'],
'status' => $row['status'],
'gender' => $row['gender'],
'disability' => $row['disability'],
'address' => $row['address'],
'citizenship' => $row['citizenship'],
]);
}
}