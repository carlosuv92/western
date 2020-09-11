<?php

namespace App\Imports;

use App\RoleUser;
use App\User;
use App\UserRelation;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function collection(Collection $rows)
    {

        foreach ($rows as $row)
        {
            //print_r($rows);die();
           if(!User::where('document', $row['documento'])->first()){} {
                $user = new User();
                $user->name = $row['nombres'];
                $user->surname = $row['apellidos'];
                $user->type_document = $row['doc'];
                $user->document = $row['documento'];
                $user->departament = $row['depa'];
                $user->province = $row['pro'];
                $user->district = $row['dis'];
                $user->address = $row['dire'];
                $user->email = $row['correo'];
                $user->password = bcrypt('123456');
                $user->save();

                $role = new RoleUser();
                $role->user_id = $row['id'];
                $role->role_id = $row['role_id'];
                $role->save();

                $relation = new UserRelation();
                $relation->user = $row['id'];
                $relation->supervisor = $row['sup_id'];
                $relation->salesmanager = $row['sup_id'];
                $relation->save();


            }

            /*if($asesor = User::where('id', $row['id'])->first()){
                    $asesor->document = $row['doc'];
                    $asesor->phone = $row['cel'];
                    $asesor->nacionalidad = $row['nac'];
                    $asesor->address = $row['dir'];
                    $asesor->cuenta = $row['cta'];
                    $asesor->afiliacion = $row['eifo'];
                    $asesor->afp = $row['tafp'];
                    $asesor->status_afiliacion = $row['tcomision'];
                   // $asesor->comment_cobro = $row['comentario'];
                    $asesor->save();
            }*/
        }
    }
}
