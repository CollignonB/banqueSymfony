<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Accounts;
use App\Entity\AccountTypes;
use App\Entity\Transferts;
use App\Entity\Users;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    // Call UserPasswordEncoderInterface for hash password
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
            // array with all account types possible for fixtures
            $baseAccountTypes = [
            'Compte Courant',
            'Livret A',
            'PEL'
        ];

            for ($i = 1; $i < 4; $i++) {

            // create Users
                $user = new Users();
                $user->setLastname("lastname" . $i);
                $user->setFirstname("firstname" . $i);
                $user->setEmail("afpa" . $i . "@bank.com");
                $user->setCity("city" . $i);
                $user->setCityCode("7600" . $i);
                $user->setAddress($i * 3 . " rue du jesaispas");
                $user->setSex(0);
                $user->setRoles(['ROLE_USER']);
                $user->setBirthDate(new \DateTime());

                // Hash password
                $password = $this->encoder->encodePassword($user, 'afpa');
                $user->setPassword($password);

                $manager->persist($user);

                // create account types
                $accountType = new AccountTypes();

                $accountType->setName($baseAccountTypes[$i - 1]);
                $manager->persist($accountType);

                // create accounts, all account for the same user has the same type
                for ($j = 1; $j < 4; $j++) {
                    $account = new Accounts();

                    $account->setAmount((float)mt_rand(100, 10000));
                    $account->setOpeningDate(new \DateTime());
                    $account->setUser($user);
                    $account->setAccountType($accountType);
                    $manager->persist($account);

                    //create trtansferts for an account
                    for ($k = 1; $k < 5; $k++) {
                        $transfert = new Transferts();

                        $transfert->setAmount((float)mt_rand(100, 1000));
                        $k % 2 === 0 ? $transfert->setType(0) : $transfert->setType(1);
                        $transfert->setAccounts($account);
                        $transfert->setDateTransfert(new \DateTime());
                        $manager->persist($transfert);
                    }
                }
            }

                    // user_ADMIN
        $lastName = ['Collignon' ,'Kouassi Dit Darboux', 'Gossart'];
        $firstName = ['Baptiste' ,'Duchaîne', 'Thomas'];
        $emailAdmin = ['cb@bank.com' ,'kd@bank.com', 'gt@bank.com'];
        $city = ['Rouen' ,'Vernon', 'Louvier'];
        $cityCode = ['76000' ,'27200', '27500'];
        $adress = ['Rue obscur' ,'Rue ténébreuse', 'Rue final'];

        for ($d = 0; $d < 3; $d++) {

            // create user_ADMIN
            $admin = new Users();
            $admin->setLastname($lastName[$d]);
            $admin->setFirstname($firstName[$d]);
            $admin->setEmail($emailAdmin[$d]);
            $admin->setCity($city[$d]);
            $admin->setCityCode($cityCode[$d]);
            $admin->setAddress($adress[$d]);
            $admin->setSex(0);
            $admin->setRoles(['ROLE_ADMIN']);
            $admin->setBirthDate(new \DateTime());
    
            // Hash password
            $password = $this->encoder->encodePassword($admin, 'afpa');
            $admin->setPassword($password);
    
            $manager->persist($admin);

             // create account types
             $accountType = new AccountTypes();

             $accountType->setName($baseAccountTypes[$d]);
             $manager->persist($accountType);

             // create accounts, all account for the same user has the same type
             for ($l = 0; $l < 4; $l++) {
                 $account = new Accounts();

                 $account->setAmount((float)mt_rand(100, 10000));
                 $account->setOpeningDate(new \DateTime());
                 $account->setUser($admin);
                 $account->setAccountType($accountType);
                 $manager->persist($account);

                 //create trtansferts for an account
                 for ($e = 1; $e < 5; $e++) {
                     $transfert = new Transferts();

                     $transfert->setAmount((float)mt_rand(100, 1000));
                     $e % 2 === 0 ? $transfert->setType(0) : $transfert->setType(1);
                     $transfert->setAccounts($account);
                     $transfert->setDateTransfert(new \DateTime());
                     $manager->persist($transfert);
                 }
             }
        }
        

        $manager->flush();
    }
}
