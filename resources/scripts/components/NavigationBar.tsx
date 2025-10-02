import * as React from 'react';
import { useState } from 'react';
import { Link, NavLink } from 'react-router-dom';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faCogs, faLayerGroup, faSignOutAlt } from '@fortawesome/free-solid-svg-icons';
import { useStoreState } from 'easy-peasy';
import { ApplicationStore } from '@/state';
import SearchContainer from '@/components/dashboard/search/SearchContainer';
import styled from 'styled-components/macro';
import http from '@/api/http';
import SpinnerOverlay from '@/components/elements/SpinnerOverlay';
import Tooltip from '@/components/elements/tooltip/Tooltip';
import Avatar from '@/components/Avatar';

const BottomNav = styled.div`
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    background: #1f1f1f;
    padding: 8px 16px;
    border-radius: 9999px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.4);
    z-index: 50;
`;

const NavItem = styled(NavLink)`
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    margin: 0 4px;
    color: #ccc;
    border-radius: 50%;
    transition: all 0.2s ease;

    &:hover {
        background: #333;
        color: #fff;
    }

    &.active {
        background: #0ea5e9;
        color: #fff;
    }
`;

const ButtonItem = styled.button`
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    margin: 0 4px;
    color: #ccc;
    border: none;
    background: transparent;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.2s ease;

    &:hover {
        background: #333;
        color: #fff;
    }
`;

export default () => {
    const name = useStoreState((state: ApplicationStore) => state.settings.data!.name);
    const rootAdmin = useStoreState((state: ApplicationStore) => state.user.data!.rootAdmin);
    const [isLoggingOut, setIsLoggingOut] = useState(false);

    const onLogout = () => {
        setIsLoggingOut(true);
        http.post('/auth/logout').finally(() => {
            // @ts-expect-error force reload
            window.location = '/';
        });
    };

    return (
        <>
            <div className={'w-full bg-neutral-900 shadow-md overflow-x-auto'}>
                <SpinnerOverlay visible={isLoggingOut} />
                <div className={'mx-auto w-full flex items-center h-[3.5rem] max-w-[1200px]'}>
                    <div id={'logo'} className={'flex-1'}>
                        <Link
                            to={'/'}
                            className={
                                'text-2xl font-header px-4 no-underline text-neutral-200 hover:text-neutral-100 transition-colors duration-150'
                            }
                        >
                            {name}
                        </Link>
                    </div>
                    <div className={'flex items-center'}>
                        <SearchContainer />
                    </div>
                </div>
            </div>

            {/* Floating Bottom Navigation */}
            <BottomNav>
                <Tooltip content="Dashboard" placement="top">
                    <NavItem to="/" exact>
                        <FontAwesomeIcon icon={faLayerGroup} />
                    </NavItem>
                </Tooltip>

                <Tooltip content="Account Settings" placement="top">
                    <NavItem to="/account">
                        <Avatar.User />
                    </NavItem>
                </Tooltip>

                {rootAdmin && (
                    <Tooltip content="Admin" placement="top">
                        <ButtonItem onClick={() => window.location.href = '/admin'}>
                            <FontAwesomeIcon icon={faCogs} />
                        </ButtonItem>
                    </Tooltip>
                )}

                <Tooltip content="Sign Out" placement="top">
                    <ButtonItem onClick={onLogout}>
                        <FontAwesomeIcon icon={faSignOutAlt} />
                    </ButtonItem>
                </Tooltip>
            </BottomNav>
        </>
    );
};
