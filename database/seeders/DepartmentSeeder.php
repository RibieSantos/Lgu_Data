<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Departments;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'department_name' => 'Office of the Mayor',
                'department_code' => 'OM',
                'description' => 'Chief executive office responsible for the administration and overall governance of the municipality.',
            ],
            [
                'department_name' => 'Sangguniang Bayan',
                'department_code' => 'SB',
                'description' => 'Legislative body responsible for enacting ordinances, approving resolutions, and formulating local policies.',
            ],
            [
                'department_name' => 'Human Resource Management Office',
                'department_code' => 'HR',
                'description' => 'Responsible for personnel administration, recruitment, training, and employee welfare.',
            ],
            [
                'department_name' => 'Municipal Budget Office',
                'department_code' => 'BUDGET',
                'description' => 'Prepares, reviews, and monitors the municipal budget.',
            ],
            [
                'department_name' => 'Municipal Treasurer\'s Office',
                'department_code' => 'TREASURY',
                'description' => 'Responsible for the collection, custody, and disbursement of municipal funds.',
            ],
            [
                'department_name' => 'Office of the Municipal Accountant',
                'department_code' => 'ACCOUNTING',
                'description' => 'Maintains accounting records and prepares financial reports.',
            ],
            [
                'department_name' => 'Municipal Planning and Development Coordinator',
                'department_code' => 'MPDC',
                'description' => 'Plans and coordinates municipal development programs and projects.',
            ],
            [
                'department_name' => 'Municipal Engineering Office',
                'department_code' => 'ENGINEERING',
                'description' => 'Responsible for planning, construction, and maintenance of municipal infrastructure.',
            ],
            [
                'department_name' => 'Municipal Assessor\'s Office',
                'department_code' => 'ASSESSOR',
                'description' => 'Conducts property assessment and maintains real property records.',
            ],
            [
                'department_name' => 'Municipal Civil Registrar',
                'department_code' => 'MCR',
                'description' => 'Registers births, marriages, deaths, and other civil registry documents.',
            ],
            [
                'department_name' => 'Municipal Social Welfare and Development Office',
                'department_code' => 'MSWDO',
                'description' => 'Provides social welfare services and implements community development programs.',
            ],
            [
                'department_name' => 'Public Employment Service Office',
                'department_code' => 'PESO',
                'description' => 'Provides employment facilitation, job matching, and livelihood assistance.',
            ],
            [
                'department_name' => 'Persons with Disability Affairs Office',
                'department_code' => 'PDAO',
                'description' => 'Promotes and protects the rights and welfare of persons with disabilities.',
            ],
            [
                'department_name' => 'Senior Citizens Affairs Office',
                'department_code' => 'OSCA',
                'description' => 'Implements programs and services for senior citizens.',
            ],
            [
                'department_name' => 'Municipal Disaster Risk Reduction and Management Office',
                'department_code' => 'MDRRMO',
                'description' => 'Responsible for disaster preparedness, response, mitigation, and recovery.',
            ],
            [
                'department_name' => 'Business Permit and Licensing Office',
                'department_code' => 'BPLO',
                'description' => 'Processes business permits, licenses, and regulatory compliance.',
            ],
            [
                'department_name' => 'Police Station',
                'department_code' => 'PNP',
                'description' => 'Maintains peace and order and enforces laws within the municipality.',
            ],
            [
                'department_name' => 'Fire Station',
                'department_code' => 'BFP',
                'description' => 'Provides fire protection, prevention, and emergency response services.',
            ],
            [
                'department_name' => 'PADANUM',
                'department_code' => 'PADANUM',
                'description' => 'Responsible for the operation and maintenance of the municipal water system.',
            ],
            [
                'department_name' => 'Department of Agriculture Office',
                'department_code' => 'DA',
                'description' => 'Provides agricultural support services and assistance to farmers.',
            ],
            [
                'department_name' => 'Commission on Elections',
                'department_code' => 'COMELEC',
                'description' => 'Administers elections and ensures free, orderly, and credible electoral processes.',
            ],
            [
                'department_name' => 'ABE',
                'department_code' => 'ABE',
                'description' => 'Municipal office designated as ABE.',
            ],
            [
                'department_name' => 'Motorpool',
                'department_code' => 'MOTORPOOL',
                'description' => 'Maintains and manages government vehicles and heavy equipment.',
            ],
            [
                'department_name' => 'Dipalo',
                'department_code' => 'DIPALO',
                'description' => 'Responsible for the management and maintenance of Dipalo facilities.',
            ],
            [
                'department_name' => 'EEMM',
                'department_code' => 'EEMM',
                'description' => 'Municipal office designated as EEMM.',
            ],
            [
                'department_name' => 'Rural Health Unit',
                'department_code' => 'RHU',
                'description' => 'Provides primary healthcare services and preventive health programs.',
            ],
            [
                'department_name' => 'Department of the Interior and Local Government',
                'department_code' => 'DILG',
                'description' => 'Supervises local governments and promotes good governance.',
            ],
            [
                'department_name' => 'Cemetery',
                'department_code' => 'CEMETERY',
                'description' => 'Responsible for the administration and maintenance of the municipal cemetery.',
            ],
            [
                'department_name' => 'SLAUGHTER',
                'department_code' => 'SLAUGHTER',
                'description' => 'Operates and maintains the municipal slaughterhouse.',
            ],
            [
                'department_name' => 'Plaza Sweeper',
                'department_code' => 'SWEEPER',
                'description' => 'Responsible for cleaning and maintaining the municipal plaza and surrounding public areas.',
            ],
        ];

        foreach ($departments as $department) {
            Departments::updateOrCreate(
                ['department_code' => $department['department_code']],
                $department
            );
        }
    }
}