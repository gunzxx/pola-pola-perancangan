package kelaspertemuan4;
import java.io.*;
import java.lang.*;

interface Colour{
    String getColour();
    String makeColour();
}

class BlackColour implements Colour{
    @Override
    public String getColour(){
        return "Black";
    }
    @Override
    public String makeColour(){
        return "BlackStrike";
    }
}

class WhiteColour implements Colour{
    @Override
    public String getColour(){
        return "White";
    }
    @Override
    public String makeColour(){
        return "WhiteOval";
    }
}

interface Animal{
    String getAnimal();
    String makeSound();
}

class Duck implements Animal{
    @Override
    public String getAnimal(){
       return "Duck";
    }
    @Override
    public String makeSound(){
        return "Quacks";
    }
}
class Dog implements Animal{
    @Override
    public String getAnimal(){
        System.out.println("This is Dog");
        return "Dog";
    }
    @Override
    public String makeSound(){
        System.out.println("I can Bark");
        return "Bark";
    }
}


interface AbstractFactory <T>{
    T create(String factoryType);
}

class AnimalFactory implements AbstractFactory<Animal>{
    @Override
    public Animal create (String factoryType){
       if ("Dogs".equalsIgnoreCase(factoryType)) {
           return new Dog();
       }
       else if ("Ducks".equalsIgnoreCase(factoryType)){
           return new Duck();
       }
       return null;
    }
}
class ColourFactory implements AbstractFactory<Colour>{
    @Override
    public Colour create (String factoryType){
       if ("Black".equalsIgnoreCase(factoryType)) {
           return new BlackColour();
       }
       else if ("White".equalsIgnoreCase(factoryType)){
           return new WhiteColour();
       }
       return null;
    }
}
class FactoryProvider {
    public static AbstractFactory getFactory(String choice){
        if ("Animal".equalsIgnoreCase(choice)){
            return new AnimalFactory();
        }
        else if("Colour".equalsIgnoreCase(choice)){
            return new ColourFactory();
        }
        return null;
    }
}

public class Kelaspertemuan4 {
    public static void main(String[] args){
        FactoryProvider fp = new FactoryProvider();
        AbstractFactory af;
        af = fp.getFactory("Animal");
        AnimalFactory fa = new AnimalFactory();
        Animal a;
        a = fa.create("Dogs");
        a.getAnimal();
        a.makeSound();   
        
    }
    
}
