Geometric-calculations
======================
Geometric Calculations

Introduction
------------
[Ruby Quiz - problem 233] (http://rubyquiz.strd6.com/quizzes/233-geometric-intersections)
*detect the intersections of various geometric elements: circles, lines, and polygons.*


Typical Setup
-------------
1.  Get a factory

        $factory = new Factory
2.  Use the factory to create points which you can then use via dependency injection and composition to create objects

        $point  = $factory->createPoint(<xCoord>, <yCoord>);
        $circle = $factory->createCircle($point, <radius>);

        $point1 = $factory->createPoint(<xCoord>, <yCoord>);
        $point2 = $factory->createPoint(<xCoord>, <yCoord>);
        $line   = $factory->createLine($point1, $point2);
3.  Once you have some Geometric Elements created, you can test their intersection

        $circle->inserect($line);
    or
        $line->intersect($circle);


PHPUnit --testdox
-----------------
    PHPUnit 3.7.22 by Sebastian Bergmann.

    Configuration read from /server/Groupon/Tests/phpunit.xml

    Circle
     [x] Object instance of should be circle
     [x] Get point should return point
     [x] Get radius should return radius value
     [x] Intersect should calculate circle intersection of line
     [x] Intersect should not calculate circle intersection of line
     [x] Intersect should calculate circle intersection of circle
     [x] Intersect should not calculate circle intersection of circle
     [x] Intersect should calculate circle intersection of polygon

    Factory
     [x] Create point should return point object
     [x] Create line should return line object
     [x] Create circle should return circle object
     [x] Create point collection should return point collection object
     [x] Create polygon should return polygon object

    Line
     [x] Object instance of should be line
     [x] Get point 1 should return point 1
     [x] Get point 2 should return point 2
     [x] Intersect should calculate line intersection of circle
     [x] Intersect should not calculate line intersection of circle
     [x] Intersect should calculate line intersection of line
     [x] Intersect should not calculate line intersection of line
     [x] Intersect should calculate line intersection of polygon

    Point_Collection
     [x] Object instance of should be points collection
     [x] Initial state should be empty
     [x] Add should add new point to collection
     [x] Current should return value at current index

    Point
     [x] Get x should return x coordinate
     [x] Get y should return y coordinate
     [x] Get distance should return distance between two points

    Polygon
     [x] Object instance of should be polygon
     [x] Get points should return point collection
     [x] Add points should add point to collection
     [x] Is valid should return true for more than two points
     [x] Is valid should return false for less than three points
     [x] Intersect should calculate polygon intersection of line
     [x] Intersect should calculate polygon intersection of circle
     [x] Intersect should throw exception if invalid polygon
     [x] Intersect should calculate polygon intersection of polygon
     [x] Intersect should not calculate polygon intersection of polygon


    Generating code coverage report in Clover XML format ... done

    Generating code coverage report in HTML format ... done
