<?php



namespace SpExpress\Sdk\Enums;

final class StatMap
{
    public const MAP_NEW = 1;
    public const MAP_ACCEPTED = 2;
    public const MAP_DELIVERED_TO_HUB = 10;
    public const MAP_IN_TRANSPORTATION = 20;
    public const MAP_IN_DELIVERY = 30;
    public const MAP_DELIVERED = 40;
    public const MAP_PROBLEM = 50;
    public const MAP_RETURN = 60;
    public const MAP_CANCELLED = 90;
}
