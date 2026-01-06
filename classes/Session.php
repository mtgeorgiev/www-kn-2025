<?php

declare(strict_types=1);

class Session {
    public static function logUser(User $user): void  {
        $_SESSION['user_id'] = $user->getId();
    }

    public static function isUserLoggedIn(): bool {
        return isset($_SESSION['user_id']);
    }
}