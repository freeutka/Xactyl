<?php

namespace Xactyl\Services\Users;

use Xactyl\Models\User;
use Xactyl\Exceptions\DisplayException;
use Illuminate\Contracts\Translation\Translator;
use Xactyl\Contracts\Repository\UserRepositoryInterface;
use Xactyl\Contracts\Repository\ServerRepositoryInterface;

class UserDeletionService
{
    /**
     * UserDeletionService constructor.
     */
    public function __construct(
        protected UserRepositoryInterface $repository,
        protected ServerRepositoryInterface $serverRepository,
        protected Translator $translator
    ) {
    }

    /**
     * Delete a user from the panel only if they have no servers attached to their account.
     *
     * @throws \Xactyl\Exceptions\DisplayException
     */
    public function handle(int|User $user): ?bool
    {
        if ($user instanceof User) {
            $user = $user->id;
        }

        $servers = $this->serverRepository->setColumns('id')->findCountWhere([['owner_id', '=', $user]]);
        if ($servers > 0) {
            throw new DisplayException($this->translator->get('admin/user.exceptions.user_has_servers'));
        }

        return $this->repository->delete($user);
    }
}
