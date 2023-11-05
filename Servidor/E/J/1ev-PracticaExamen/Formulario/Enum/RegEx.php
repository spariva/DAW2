<?php

namespace Enum;

enum RegEx : string {
    case TEXT = "/^[a-zA-ZÀ-ÿ\s]+$/";
    case PASSWORD = "/[\w]/";
    case MAIL = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/";
}