<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserSearchView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('DROP VIEW IF Exists user_qualification_search; create view user_qualification_search as
        SELECT DISTINCT
        users.id,
        user_basic_details.userImages,
        users.name,
        users.email,
        (
        SELECT
            GROUP_CONCAT(
                user_qualifications.qualification
            )
        FROM
            user_qualifications
        WHERE
            user_qualifications.user = users.id
    ) AS qualification,
    (
    SELECT
        GROUP_CONCAT(user_qualifications.subject)
    FROM
        user_qualifications
    WHERE
        user_qualifications.user = users.id
    ) AS subject,
    (
    SELECT
        GROUP_CONCAT(
            user_qualifications.year_passout
        )
    FROM
        user_qualifications
    WHERE
        user_qualifications.user = users.id
    ) AS year_passout,
    country.country,
    state.state,
    city.city,
    panchayath.panchayath,
    pincode.pincode,
    user_basic_details.age,
    user_basic_details.sex,
    user_secondary_details.working_exp,
    user_secondary_details.intrested_to_work,
    user_basic_details.expected_salary,
    user_secondary_details.other_facilities_accomodation,
    user_secondary_details.other_facilities_spouce_stay,
    user_secondary_details.other_facilities_transportation,
    user_secondary_details.marital_status
    FROM
        users
    LEFT JOIN
        user_basic_details
    ON
        user_basic_details.user_id = users.id
    LEFT JOIN
        user_secondary_details
    ON
        user_secondary_details.user_basic_id = user_basic_details.id
    LEFT JOIN
        country
    ON
        country.id = user_basic_details.country
    LEFT JOIN
        state
    ON
        state.id = user_basic_details.state
    LEFT JOIN
        city
    ON
        city.id = user_basic_details.city
    LEFT JOIN
        panchayath
    ON
        panchayath.id = user_basic_details.panchayath
    LEFT JOIN
        pincode
    ON
        pincode.id = user_basic_details.pincode
    LEFT JOIN
        role_user
    ON
        role_user.user_id = users.id
        Inner JOIN roles on roles.id = role_user.role_id
    WHERE
		roles.name not in ("admin", "user")
    Having qualification != ""
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('Drop view  if exists user_qualification_search');
    }
}
