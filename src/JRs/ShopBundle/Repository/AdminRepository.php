<?php

namespace Repository;

    use Doctrine\ORM\EntityRepository;
    use Symfony\Component\Security\Core\User\UserProviderInterface;
    use Symfony\Component\Security\Core\User\UserInterface;

class AdminRepository extends EntityRepository implements UserProviderInterface {

    /* methods implementing UserProviderInterface abstract methods */

    public function loadUserByUsername($username) {
        return $this->findOneBy(array('username' => $username));
    }

    public function refreshUser(UserInterface $user) {
        if (!$user instanceof WebserviceUser) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class) {
        return true;
    }


    /* custom queries */

    /**
     * example custom query returning all admins with the given salt sorted by name.
     */
    public function getAdminsQuery($desired_salt) {
        $query = $this->createQueryBuilder('a')
                ->select('a')
            >addOrderBy('a.username', 'DESC')
                ->andwhere('a.salt = :salt')
                ->setParameter('salt', $desired_salt);
        return $query->getQuery()->getResult();
    }
}
