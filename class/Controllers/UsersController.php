<?php

namespace App\Controllers;

use App\Services\UsersService;
use App\Services\CarsService;

class UsersController
{
    /**
     * Return the html for the create action.
     */
    public function createUser(): void
    {
        $insert_result = '';

        // If the form have been submitted :
        if (isset($_POST['firstname']) &&
            isset($_POST['lastname']) &&
            isset($_POST['email']) &&
            isset($_POST['birthday']) &&
            isset($_POST['cars'])) {
            // Create the user :
            $usersService = new UsersService();
            $userId = $usersService->setUser(
                null,
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['birthday']
            );
            $isOk = true;
            if (!empty($_POST['cars'])) {
                foreach ($_POST['cars'] as $carId) {
                    $isOk = $usersService->setUserCar($userId, $carId);
                }
            }
            if ($isOk) {
                $insert_result = 'Utilisateur créé avec succès.';
            } else {
                $insert_result = 'Erreur lors de la création de l\'utilisateur.';
            }
        }

        $carsService = new CarsService();
        $_cars = $carsService->getCars();

        require 'views/user/user_create.php';
    }

    /**
     * Return the html for the read action.
     */
    public function getUsers(): void
    {
        $html = '';

        // Get all users :
        $usersService = new UsersService();
        $_users = $usersService->getUsers();

        require 'views/user/user_read.php';
    }

    /**
     * Update the user.
     */
    public function updateUser(): void
    {
        $update_result = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['firstname']) &&
            isset($_POST['lastname']) &&
            isset($_POST['email']) &&
            isset($_POST['birthday']) &&
            isset($_POST['cars'])) {
            // Update the user :
            $usersService = new UsersService();
            $userId = $usersService->setUser(
                $_POST['id'],
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['birthday']
            );
            
            $isOk = true;
            if (!empty($_POST['cars'])) {
                foreach ($_POST['cars'] as $carId) {
                    $isOk = $usersService->setUserCar($userId, $carId);
                }
            }

            if ($isOk) {
                $update_result = 'Utilisateur mis à jour avec succès.';
            } else {
                $update_result = 'Erreur lors de la mise à jour de l\'utilisateur.';
            }
        }

        $carsService = new CarsService();
        $_cars = $carsService->getCars();

        require 'views/user/user_update.php';
    }

    /**
     * Delete an user.
     */
    public function deleteUser(): void
    {
        $delete_result = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the user :
            $usersService = new UsersService();
            $isOk = $usersService->deleteUser($_POST['id']);
            if ($isOk) {
                $delete_result = 'Utilisateur supprimé avec succès.';
            } else {
                $delete_result = 'Erreur lors de la supression de l\'utilisateur.';
            }
        }

        require 'views/user/user_delete.php';
    }
}
